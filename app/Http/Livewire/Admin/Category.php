<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\HasSweetalert;
use Illuminate\Support\Facades\DB;
use App\Models\Category as ModelsCategory;

class Category extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $category_id;
    protected $listeners = ['destroy'];

    public function render()
    {
        $categories = ModelsCategory::withCount('portopolios')->searching($this->name)->latest()->paginate(10);
        return view('livewire.admin.category.index', compact('categories'));
    }

    protected $rules = [
        'name' => 'required|unique:categories,name'
    ];

    private function resetForm()
    {
        $this->is_form  = false;
        $this->name     = null;
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
            ModelsCategory::create([
                'name'      => $this->name,
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','Category Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = ModelsCategory::find($id);
        $this->category_id  = $category->id;
        $this->name         = $category->name;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:categories,name,'. $this->category_id,
        ]);

        DB::beginTransaction();
        try {
            ModelsCategory::find($this->category_id)->fill([
                'name'      => $this->name,
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','Category Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $category = ModelsCategory::find($id);
        $this->category_id = $category->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelsCategory::find($this->category_id)->delete();
        $this->alert('success','Category Has Been Deleted');
    }
}
