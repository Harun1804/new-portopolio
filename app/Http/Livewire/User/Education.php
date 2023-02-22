<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;
use App\Models\Education as ModelsEducation;
use Illuminate\Support\Facades\Auth;

class Education extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $level, $major, $year_in, $year_out, $university, $city, $nation, $description, $education_id;
    protected $listeners = ['destroy'];
    protected $rules = [
        'level'      => 'required|in:D3,D4,S1,S2,S3',
        'major'      => 'required',
        'year_in'    => 'required',
        'year_out'   => 'required',
        'university' => 'required',
        'city'       => 'required',
        'nation'     => 'required',
        'description'=> 'nullable|string',
    ];

    private function resetForm()
    {
        $this->is_form      = false;
        $this->level        = null;
        $this->major        = null;
        $this->year_in      = null;
        $this->year_out     = null;
        $this->university   = null;
        $this->city         = null;
        $this->nation       = null;
        $this->description  = null;
    }

    public function render()
    {
        $payload = [
            'level'      => $this->level,
            'major'      => $this->major,
            'year_in'    => $this->year_in,
            'year_out'   => $this->year_out,
            'university' => $this->university,
            'city'       => $this->city,
            'nation'     => $this->nation,
        ];
        $educations = ModelsEducation::searching($payload)->latest()->getByUser()->paginate(10);
        return view('livewire.user.education.index', compact('educations'));
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
            ModelsEducation::create([
                'user_id'    => Auth::user()->id,
                'level'      => $this->level,
                'major'      => $this->major,
                'year_in'    => $this->year_in,
                'year_out'   => $this->year_out,
                'university' => $this->university,
                'city'       => $this->city,
                'nation'     => $this->nation,
                'description'=> $this->description
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Education Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $education = ModelsEducation::find($id);
        $this->education_id = $education->id;
        $this->level        = $education->level;
        $this->major        = $education->major;
        $this->year_in      = $education->year_in;
        $this->year_out     = $education->year_out;
        $this->university   = $education->university;
        $this->city         = $education->city;
        $this->nation       = $education->nation;
        $this->description  = $education->description;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            ModelsEducation::find($this->education_id)->fill([
                'level'      => $this->level,
                'major'      => $this->major,
                'year_in'    => $this->year_in,
                'year_out'   => $this->year_out,
                'university' => $this->university,
                'city'       => $this->city,
                'nation'     => $this->nation,
                'description'=> $this->description
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Education Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $education = ModelsEducation::find($id);
        $this->education_id = $education->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsEducation::find($this->education_id)->delete();
        $this->alert('success','Education Has Been Deleted');
    }
}
