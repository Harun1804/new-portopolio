<?php

namespace App\Http\Livewire\User;

use App\Models\Skill as ModelsSkill;
use App\Models\User;
use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\Auth;

class Skill extends Component
{
    use HasSweetalert;

    public $is_form = false;
    public $skill_value, $skill_id;
    public $skills, $user_skills;

    protected $listeners = ['destroy'];
    protected $rules = [
        'skill_value'   => 'required|integer',
        'skill_id'      => 'required|exists:skills,id|max:100|min:0'
    ];

    private function resetInput()
    {
        $this->skill_value  = null;
        $this->skill_id     = null;
    }

    public function mount()
    {
        $this->skills = ModelsSkill::get();
        $this->user_skills = User::with('skills')->find(Auth::user()->id);
    }

    public function render()
    {
        $user = User::with('skills')->find(Auth::user()->id);
        return view('livewire.user.skill.index', compact('user'));
    }

    public function create()
    {
        $this->resetInput();
        $this->is_form = true;
    }

    public function edit($id)
    {
        $this->is_form = true;
        $skill = $this->user_skills->skills->where('id', $id)->first();
        $this->skill_id    = $skill->pivot->skill_id;
        $this->skill_value = $skill->pivot->value;
    }

    public function store()
    {
        $this->validate();

        $user = $this->user_skills;

        if($user->skills->contains($this->skill_id)){
            $user->skills()->updateExistingPivot($this->skill_id,['value' => $this->skill_value]);
        }else{
            $user->skills()->attach($this->skill_id,['value' => $this->skill_value]);
        }

        $this->is_form = false;
        $this->resetInput();
        $this->alert('success','User Skill Telah Diperbaharui');
    }

    public function confirm($skill_id)
    {
        $this->skill_id = $skill_id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        $user = $this->user_skills;
        if($user->skills->contains($this->skill_id)){
            $user->skills()->detach($this->skill_id);
        }
        $this->alert('success','User Skill Has Been Deleted');
    }
}
