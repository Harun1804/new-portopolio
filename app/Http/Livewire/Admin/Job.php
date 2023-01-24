<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Job as ModelsJob;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;

class Job extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $job_id;

    protected $listeners = ['destroy'];

    public function render()
    {
        $jobs = ModelsJob::withCount('users')->searching($this->name)->latest()->paginate(10);
        return view('livewire.admin.job.index', compact('jobs'));
    }

    private function resetForm()
    {
        $this->is_form  = false;
        $this->name     = null;
    }

    protected $rules = [
        'name' => 'required|unique:jobs,name'
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
            ModelsJob::create([
                'name'      => $this->name,
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Job Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $job = ModelsJob::find($id);
        $this->job_id  = $job->id;
        $this->name         = $job->name;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:jobs,name,'. $this->job_id,
        ]);

        DB::beginTransaction();
        try {
            ModelsJob::find($this->job_id)->fill([
                'name'      => $this->name,
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Job Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $job = ModelsJob::find($id);
        $this->job_id = $job->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsJob::find($this->job_id)->delete();
        $this->alert('success','Job Has Been Deleted');
    }
}
