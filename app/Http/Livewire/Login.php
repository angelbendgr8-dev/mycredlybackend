<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
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
                session()->flash('error',"Invalid Login details credentials");
            }
        }else{
            session()->flash('error',"Credential not found");
        }
    }
    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
