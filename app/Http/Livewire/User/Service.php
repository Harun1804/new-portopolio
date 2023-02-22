<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\Auth;
use App\Models\Service as ModelsService;

class Service extends Component
{
    use HasSweetalert;

    public $is_form = false;
    public $service_id;
    public $services, $service_user;

    protected $listeners = ['destroy'];
    protected $rules = [
        'service_id'      => 'required|exists:services,id'
    ];

    private function resetInput()
    {
        $this->service_id     = null;
    }


    public function mount()
    {
        $this->services = ModelsService::get();
        $this->service_user = User::with('services')->find(Auth::user()->id);
    }

    public function render()
    {
        $user = User::with('services')->find(Auth::user()->id);
        return view('livewire.user.service.index', compact('user'));
    }

    public function create()
    {
        $this->resetInput();
        $this->is_form = true;
    }

    public function edit($id)
    {
        $this->is_form       = true;
        $service             = $this->service_user->services->where('id', $id)->first();
        $this->service_id    = $service->pivot->service_id;
    }

    public function store()
    {
        $this->validate();

        $user = $this->service_user;

        if($user->services->contains($this->service_id)){
            $this->alert('error','User service sudah ada');
        }else{
            $user->services()->attach($this->service_id);
            $this->alert('success','User service Telah Diperbaharui');
        }

        $this->is_form = false;
        $this->resetInput();
    }

    public function confirm($service_id)
    {
        $this->service_id = $service_id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        $user = $this->service_user;
        if($user->services->contains($this->service_id)){
            $user->services()->detach($this->service_id);
        }
        $this->alert('success','User service Has Been Deleted');
    }
}
