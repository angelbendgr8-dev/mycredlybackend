<?php

namespace App\Http\Livewire;

use App\Models\Bank;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddBank extends Component
{

    use LivewireAlert;
    public $account_name, $bank_name, $account_number;

    protected $rules = [
        'bank_name' => 'required|string',
        'account_name' => 'string|required',
        'account_number' => 'required|string',
    ];
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function addBank()
    {
        $validatedData = $this->validate();

        $validatedData['user_id'] = Auth::id();
        Bank::create($validatedData);
        $this->alert('success', 'Bank added Successfully');

        $this->bank_name = '';
        $this->account_name = '';
        $this->account_number = '';
    }
    public function render()
    {
        return view('livewire.add-bank')->layout('layouts.main');
    }
}
