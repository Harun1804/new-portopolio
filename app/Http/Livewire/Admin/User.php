<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Traits\HasSweetalert;
use App\Models\User as ModelUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    use HasSweetalert;

    public $is_form = false, $is_update = false;
    public $name, $email, $user_id;

    protected $listeners = ['destroy'];

    public function render()
    {
        $users = ModelUser::searching($this->name, $this->email)->userOnly()->latest()->paginate(10);
        return view('livewire.admin.user.index', compact('users'));
    }

    private function resetForm()
    {
        $this->is_form  = false;
        $this->name     = null;
        $this->email    = null;
    }

    protected $rules = [
        'name'  => 'required|unique:users,name',
        'email' => 'required|email:dns|unique:users,email'
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
            ModelUser::create([
                'name'      => $this->name,
                'email'     => $this->email,
                'slug'      => Str::slug($this->name),
                'password'  => Hash::make('portouser'),
                'role'      => 'user'
            ]);

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->alert('success','User Has Been Created');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = ModelUser::find($id);
        $this->user_id      = $user->id;
        $this->name         = $user->name;
        $this->email        = $user->email;
        $this->is_form      = true;
        $this->is_update    = true;
    }

    public function update()
    {
        $this->validate([
            'name'      => 'required|unique:users,name,'. $this->user_id,
            'email'     => 'required|email:dns|unique:users,email,'. $this->user_id,
        ]);

        DB::beginTransaction();
        try {
            ModelUser::find($this->user_id)->fill([
                'name'      => $this->name,
                'email'     => $this->email,
                'slug'      => Str::slug($this->name),
            ])->save();

            DB::commit();
            $this->resetForm();
            $this->is_form = false;
            $this->is_update = false;
            $this->alert('success','User Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error',$e->getMessage());
        }
    }

    public function confirm($id)
    {
        $user = ModelUser::find($id);
        $this->user_id = $user->id;
        $this->alertConfirm();
    }

    public function destroy()
    {
        ModelUser::find($this->user_id)->delete();
        $this->alert('success','User Has Been Deleted');
    }
}
