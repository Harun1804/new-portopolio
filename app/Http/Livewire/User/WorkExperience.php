<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkExperience as ModelsWorkExperience;
use App\Models\WorkExperienceDetail;

class WorkExperience extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $position, $year_from, $year_to, $city, $nation, $activity, $work_exp_id;
    protected $listeners = ['destroy'];
    protected $rules = [
        'position'   => 'required',
        'year_from'  => 'required|digits:4|integer|min:1900',
        'year_to'    => 'nullable|digits:4|integer|min:1900',
        'city'       => 'required',
        'nation'     => 'required',
        'activity'   => 'required|string',
    ];

    private function resetForm()
    {
        $this->is_form      = false;
        $this->position     = null;
        $this->year_from    = null;
        $this->year_to      = null;
        $this->city         = null;
        $this->nation       = null;
        $this->activity     = null;
    }
    public function render()
    {
        $payload = [
            'position'  => $this->position,
            'year_from' => $this->year_from,
            'year_to'   => $this->year_to,
            'city'      => $this->city,
            'nation'    => $this->nation,
        ];
        $work_experiences = ModelsWorkExperience::with('details')->searching($payload)->latest()->getByUser()->paginate(10);
        return view('livewire.user.work-exp.index', compact('work_experiences'));
    }

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
            $work = ModelsWorkExperience::create([
                'user_id'   => Auth::user()->id,
                'position'  => $this->position,
                'year_from' => $this->year_from,
                'year_to'   => $this->year_to,
                'city'      => $this->city,
                'nation'    => $this->nation,
            ]);

            $activities = explode("\n", $this->activity);
            foreach ($activities as $activity) {
                WorkExperienceDetail::create([
                    'work_experience_id' => $work->id,
                    'activity' => $activity
                ]);
            }

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Work Experience Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $workExp = ModelsWorkExperience::find($id);
        $activities = WorkExperienceDetail::where('work_experience_id', $id)->get();
        $mergeActivity = '';
        foreach ($activities as $activity) {
            $mergeActivity .= $activity->activity."\n";
        }
        $this->work_exp_id  = $workExp->id;
        $this->position     = $workExp->position;
        $this->year_from    = $workExp->year_from;
        $this->year_to      = $workExp->year_to;
        $this->city         = $workExp->city;
        $this->nation       = $workExp->nation;
        $this->activity     = $mergeActivity;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            ModelsWorkExperience::find($this->work_exp_id)->fill([
                'user_id'   => Auth::user()->id,
                'position'  => $this->position,
                'year_from' => $this->year_from,
                'year_to'   => $this->year_to,
                'city'      => $this->city,
                'nation'    => $this->nation,
            ])->save();

            $activities = explode("\n", $this->activity);
            $oldActivities = WorkExperienceDetail::where('work_experience_id', $this->work_exp_id)->get();
            foreach ($oldActivities as $oldActivity) {
                $detail = WorkExperienceDetail::find($oldActivity->id);
                foreach ($activities as $newActivity) {
                    if (!empty($newActivity)) {
                        if ($oldActivity->activity != $newActivity && $oldActivity->work_experience_id == $this->work_exp_id) {
                            $this->updateActivity($detail, $newActivity);
                        }elseif($oldActivity->activity != $newActivity && $oldActivity->work_experience_id != $this->work_exp_id){
                            WorkExperienceDetail::create([
                                'work_experience_id'    => $this->work_exp_id,
                                'activity'              => $newActivity
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Work Experience Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $workExp = ModelsWorkExperience::find($id);
        $this->work_exp_id = $workExp->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsWorkExperience::find($this->work_exp_id)->delete();
        $this->alert('success','Work Experience Has Been Deleted');
    }

    private function updateActivity($detail, $newActivity)
    {
        $detail->update([
            'activity' => $newActivity
        ]);
    }
}
