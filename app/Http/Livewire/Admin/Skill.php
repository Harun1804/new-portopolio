<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;
use App\Models\Skill as ModelsSkill;

class Skill extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $skill_id;

    protected $listeners = ['destroy'];

    public function render()
    {
        $skills = ModelsSkill::withCount('users')->searching($this->name)->latest()->paginate(10);
        return view('livewire.admin.skill.index', compact('skills'));
    }

    private function resetForm()
    {
        $this->is_form  = false;
        $this->name     = null;
    }

    protected $rules = [
        'name' => 'required|unique:skills,name'
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
            ModelsSkill::create([
                'name'      => $this->name,
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Skill Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $skill = ModelsSkill::find($id);
        $this->skill_id       = $skill->id;
        $this->name         = $skill->name;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:skills,name,'. $this->skill_id,
        ]);

        DB::beginTransaction();
        try {
            ModelsSkill::find($this->skill_id)->fill([
                'name'      => $this->name,
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Skill Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $skill = ModelsSkill::find($id);
        $this->skill_id = $skill->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsSkill::find($this->skill_id)->delete();
        $this->alert('success','Skill Has Been Deleted');
    }
}
