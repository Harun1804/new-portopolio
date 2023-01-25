<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SocialMedia;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;

class Sosmed extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $icon, $sosmed_id;

    protected $listeners = ['destroy'];

    public function render()
    {
        $sosmeds = SocialMedia::withCount('users')->searching($this->name, $this->icon)->latest()->paginate(10);
        return view('livewire.admin.sosmed.index', compact('sosmeds'));
    }

    private function resetForm()
    {
        $this->is_form  = false;
        $this->name     = null;
        $this->icon     = null;
    }

    protected $rules = [
        'name' => 'required|unique:social_media,name',
        'icon' => 'required'
    ];

    public function create()
    {
        $this->resetForm();
        $this->is_form = true;
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            SocialMedia::create([
                'name'      => $this->name,
                'icon'      => $this->icon,
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Social Media Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $sosmed = SocialMedia::find($id);
        $this->sosmed_id    = $sosmed->id;
        $this->name         = $sosmed->name;
        $this->icon         = $sosmed->icon;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:social_media,name,'. $this->sosmed_id,
        ]);

        DB::beginTransaction();
        try {
            SocialMedia::find($this->sosmed_id)->fill([
                'name'      => $this->name,
                'icon'      => $this->icon,
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Social Media Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $sosmed = SocialMedia::find($id);
        $this->sosmed_id = $sosmed->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        SocialMedia::find($this->sosmed_id)->delete();
        $this->alert('success','Social Media Has Been Deleted');
    }
}
