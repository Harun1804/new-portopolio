<?php

namespace App\Http\Livewire\User;

use App\Models\About as ModelsAbout;
use App\Traits\HasImage;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    use HasSweetalert, HasImage, WithFileUploads;

    public $is_form = false;
    public $date_of_birth, $site, $phone, $city, $nation, $freelance, $description, $profile, $header;
    public $user;

    public function render()
    {
        $about = ModelsAbout::with('user')->getByUser($this->user->id)->first();
        return view('livewire.user.about.index', compact('about'));
    }

    public function mount()
    {
        $this->user = Auth::user();
    }

    protected $rules = [
        'date_of_birth' => 'required|date',
        'site'          => 'nullable|url',
        'phone'         => 'required|string',
        'city'          => 'required',
        'nation'        => 'required',
        'freelance'     => 'required|in:available,half available,not available',
        'description'   => 'required',
        'profile'       => 'required|image|max:2048',
        'header'        => 'required|image|max:2048'
    ];

    public function create()
    {
        $this->is_form = true;
        $about = ModelsAbout::getByUser($this->user->id)->first();
        if($about){
            $this->date_of_birth    = $about->date_of_birth;
            $this->site             = $about->site;
            $this->phone            = $about->phone;
            $this->city             = $about->city;
            $this->nation           = $about->nation;
            $this->freelance        = $about->freelance_status;
            $this->description      = $about->description;
        }
    }

    public function store()
    {
        $this->validate();

        $about = ModelsAbout::getByUser($this->user->id)->first();
        if ($about) {
            $this->removeImage($about->profile,'profile');
            $this->removeImage($about->hero,'header');
        }

        $this->uploadImage($this->profile,'profile');
        $this->uploadImage($this->header,'header');

        ModelsAbout::updateOrCreate([
            'user_id'           => $this->user->id
        ],[
            'user_id'           => $this->user->id,
            'date_of_birth'     => $this->date_of_birth,
            'site'              => $this->site,
            'phone'             => $this->phone,
            'city'              => $this->city,
            'nation'            => $this->nation,
            'freelance_status'  => $this->freelance,
            'description'       => $this->description,
            'profile'           => $this->profile->hashName(),
            'hero'              => $this->header->hashName()
        ]);

        $this->is_form = false;
        $this->alert('success','About Has Been Added');
    }
}
