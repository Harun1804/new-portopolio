<?php

namespace App\Http\Livewire\Admin;

use App\Models\Job;
use App\Models\User;
use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;

class PersonJob extends Component
{
    use HasSweetalert;

    public $is_form = false;
    public $job_id, $user_id;
    public $jobs;

    protected $listeners = ['destroy'];

    public function render()
    {
        $users = User::with('jobs')->latest()->paginate(10);
        return view('livewire.admin.person-job.index',compact('users'));
    }

    protected $rules = [
        'job_id' => 'required|exists:jobs,id'
    ];

    public function mount()
    {
        $this->jobs = Job::get();
    }

    private function resetForm()
    {
        $this->is_form  = false;
    }

    public function create($id)
    {
        $this->resetForm();
        $this->is_form = true;
        $this->user_id = $id;
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $user = User::find($this->user_id);
            if(!$user->jobs->contains($this->job_id)){
                $user->jobs()->attach($this->job_id);
                DB::commit();
                $this->alert('success','Job Has Been Assigned');
            }else{
                DB::rollBack();
                $this->alert('error','Job Already Assigned');
            }

            $this->resetForm();
            $this->is_form = false;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm(User $user, $job_id)
    {
        $this->user_id = $user->id;
        $this->job_id = $job_id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        DB::beginTransaction();
        try {
            $user = User::find($this->user_id);
            if($user->jobs->contains($this->job_id)){
                $user->jobs()->detach($this->job_id);
                DB::commit();
                $this->alert('success','Job Has Been Removed');
            }else{
                DB::rollBack();
                $this->alert('error','Job Not Found Assigned');
            }

            $this->resetForm();
            $this->is_form = false;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }
}
