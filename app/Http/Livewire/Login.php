<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;
    public $email,$password;


    protected $rules = [
        'email'=> 'required|email',
        'password' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function authenticate(){
        $validatedData = $this->validate();
        $user = User::whereEmail($validatedData['email'])->first();
        // dd($user);
        // dd($validatedData['password']);
        if($user && $user->type === 'admin'){
            if(Auth::attempt(array('email'=> $validatedData['email'],'password'=> $validatedData['password']))){
                return redirect(route('admin.home'));
            }else{
                $this->alert('error',"Invalid Login details credentials");
            }
        }else{
            $this->alert('error',"Invalid Login details credentials");
        }
    }
    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
