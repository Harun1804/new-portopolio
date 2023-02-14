<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Traits\HasImage;
use App\Traits\HasSweetalert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Portopolio as ModelsPortopolio;
use App\Models\PortopolioSlideshow;

class Portopolio extends Component
{
    use HasSweetalert, WithFileUploads, HasImage;

    public $is_form = false, $is_detail = false;
    public $category_id, $name, $description, $start_date, $end_date, $url, $client, $thumbnail, $portopolio_id;
    public $imageShow, $slider_id;
    public $categories, $user, $sliders;
    protected $listeners = ['destroy','deleteSlideshow'];

    public function mount()
    {
        $this->categories   = Category::get();
        $this->user         = Auth::user();
    }

    protected $rules = [
        'category_id'   => 'required|exists:categories,id',
        'name'          => 'required|string',
        'description'   => 'required|string',
        'start_date'    => 'required|date',
        'end_date'      => 'nullable|date',
        'url'           => 'nullable|url',
        'client'        => 'nullable|string',
        'thumbnail'     => 'nullable|image|max:2048'
    ];

    private function resetInput()
    {
        $this->category_id  = null;
        $this->name         = null;
        $this->description  = null;
        $this->start_date   = null;
        $this->end_date     = null;
        $this->url          = null;
        $this->client       = null;
        $this->thumbnail    = null;
        $this->portopolio_id = null;
    }

    private function removeSliderImages($portopolio_id)
    {
        $sliders = PortopolioSlideshow::getByPortopolio($portopolio_id)->get();
        foreach ($sliders as $slider) {
            $this->removeImage($slider->image,'slider');
        }
    }

    public function render()
    {
        $portopolios = ModelsPortopolio::getByUser($this->user->id)->searching($this->name)->latest()->get();
        return view('livewire.user.portopolio.index', compact('portopolios'));
    }

    public function create()
    {
        $this->is_form = true;
        $this->resetInput();
    }

    public function store()
    {
        $this->validate();
        $portopolio = ModelsPortopolio::find($this->portopolio_id);
        if($portopolio){
            if($this->thumbnail){
                $this->removeImage($portopolio->thumbnail,'thumbnail');
                $this->uploadImage($this->thumbnail,'thumbnail');

                $portopolio->update([
                    'category_id'   => $this->category_id,
                    'name'          => $this->name,
                    'description'   => $this->description,
                    'start_date'    => $this->start_date,
                    'end_date'      => $this->end_date,
                    'url'           => $this->url,
                    'client'        => $this->client,
                    'thumbnail'     => $this->thumbnail->hashName()
                ]);
            }

            $portopolio->update([
                'category_id'   => $this->category_id,
                'name'          => $this->name,
                'description'   => $this->description,
                'start_date'    => $this->start_date,
                'end_date'      => $this->end_date,
                'url'           => $this->url,
                'client'        => $this->client
            ]);
            $this->alert('success','Portopolio Has Been Updated');
        }else{
            $this->uploadImage($this->thumbnail,'thumbnail');
            ModelsPortopolio::create([
                'user_id'       => $this->user->id,
                'category_id'   => $this->category_id,
                'name'          => $this->name,
                'description'   => $this->description,
                'start_date'    => $this->start_date,
                'end_date'      => $this->end_date,
                'url'           => $this->url,
                'client'        => $this->client,
                'thumbnail'     => $this->thumbnail->hashName()
            ]);
            $this->alert('success','Portopolio Has Been Added');
        }
        $this->is_form = false;
        $this->resetInput();
    }

    public function edit($id)
    {
        $portopolio = ModelsPortopolio::find($id);
        $this->category_id  = $portopolio->category_id;
        $this->name         = $portopolio->name;
        $this->description  = $portopolio->description;
        $this->start_date   = $portopolio->start_date;
        $this->end_date     = $portopolio->end_date;
        $this->url          = $portopolio->url;
        $this->client       = $portopolio->client;
        $this->portopolio_id = $portopolio->id;
        $this->is_form = true;
    }

    public function confirm($id)
    {
        $this->portopolio_id = $id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        $portopolio = ModelsPortopolio::find($this->portopolio_id);
        $this->removeImage($portopolio->thumbnail,'thumbnail');
        $this->removeSliderImages($portopolio->id);
        $portopolio->delete();
        $this->alert('success','Portopolio Has Been Deleted');
    }

    public function show($id)
    {
        $this->portopolio_id = $id;
        $this->sliders = PortopolioSlideshow::getByPortopolio($id)->get();
        $this->is_detail = true;
    }

    public function addSlideshow()
    {
        $this->validate([
            'imageShow' => 'required|image|max:2048'
        ]);

        $this->uploadImage($this->imageShow,'slider');
        PortopolioSlideshow::create([
            'portopolio_id' => $this->portopolio_id,
            'image'         => $this->imageShow->hashName()
        ]);
        $this->imageShow = null;
        $this->alert('success','Slider Has Been Added');
    }

    public function confirmSlideshow($id)
    {
        $this->slider_id = $id;
        $this->alertConfirmSlider();
    }

    public function deleteSlideshow()
    {
        $slider = PortopolioSlideshow::find($this->slider_id);
        $this->removeImage($slider->image,'slider');
        $slider->delete();
        $this->alert('success','Slider Has Been Deleted');
    }

    public function closeShow()
    {
        $this->portopolio_id    = false;
        $this->is_detail        = false;
    }
}
