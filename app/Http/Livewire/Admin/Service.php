<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;
use App\Models\Service as ModelsService;

class Service extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $icon, $description, $service_id;

    protected $listeners = ['destroy'];

    protected $rules = [
        'name'          => 'required|unique:services,name',
        'icon'          => 'required',
        'description'   => 'nullable|string'
    ];

    private function resetForm()
    {
        $this->is_form      = false;
        $this->name         = null;
        $this->icon         = null;
        $this->description  = null;
    }

    public function render()
    {
        $services = ModelsService::withCount('users')->searching($this->name, $this->icon)->latest()->paginate(10);
        return view('livewire.admin.service.index', compact('services'));
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
            ModelsService::create([
                'name'          => $this->name,
                'icon'          => $this->icon,
                'description'   => $this->description,
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Service Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = ModelsService::find($id);
        $this->service_id   = $service->id;
        $this->name         = $service->name;
        $this->icon         = $service->icon;
        $this->description  = $service->description;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:services,name,'. $this->service_id,
        ]);

        DB::beginTransaction();
        try {
            ModelsService::find($this->service_id)->fill([
                'name'          => $this->name,
                'icon'          => $this->icon,
                'description'   => $this->description,
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Service Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $service = ModelsService::find($id);
        $this->service_id = $service->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsService::find($this->service_id)->delete();
        $this->alert('success','Service Has Been Deleted');
    }
}
