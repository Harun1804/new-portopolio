<?php

namespace App\Http\Livewire\User;

use App\Models\SocialMedia;
use App\Models\User;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sosmed extends Component
{
    use HasSweetalert;

    public $is_form = false;
    public $url,$sosmed_id;
    public $sosmeds, $user_sosmeds;

    protected $rules = [
        'url' => 'required|url'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $users = User::with('sosmeds')->find(Auth::user()->id);
        return view('livewire.user.sosmed.index', compact('users'));
    }

    public function mount()
    {
        $this->sosmeds = SocialMedia::get();
        $this->user_sosmeds = User::with('sosmeds')->find(Auth::user()->id);
    }

    private function resetInput()
    {
        $this->url = null;
    }

    public function create()
    {
        $this->resetInput();
        $this->is_form = true;
    }

    public function store()
    {
        $this->validate();

        $user = $this->user_sosmeds;

        if($user->sosmeds->contains($this->sosmed_id)){
            $user->sosmeds()->updateExistingPivot($this->sosmed_id,['url' => $this->url]);
        }else{
            $user->sosmeds()->attach($this->sosmed_id,['url' => $this->url]);
        }

        $this->is_form = false;
        $this->resetInput();
        $this->alert('success','User Sosmed Telah Diperbaharui');
    }

    public function edit($id)
    {
        $this->is_form = true;
        $sosmed = $this->user_sosmeds->sosmeds->where('id', $id)->first();
        $this->sosmed_id    = $sosmed->pivot->social_media_id;
        $this->url          = $sosmed->pivot->url;
    }

    public function confirm($sosmed_id)
    {
        $this->sosmed_id = $sosmed_id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        $user = $this->user_sosmeds;
        if($user->sosmeds->contains($this->sosmed_id)){
            $user->sosmeds()->detach($this->sosmed_id);
        }
        $this->alert('success','User Sosmed Has Been Deleted');
    }
}
