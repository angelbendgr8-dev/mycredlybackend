<?php

namespace App\Http\Livewire;

use App\Models\WalletCategory;
use App\Models\WalletType;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateWalletType extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $name, $icon, $symbol,$categories,$category;

    protected $rules = [
        'name' => 'required|string',
        'icon' => 'image',
        'symbol' => 'required|string',
        'category' => 'required',
    ];
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }
    public function mount()
    {
        $this->categories = WalletCategory::all();
        // dd($category);
    }
    public function addAsset()
    {
        $validatedData = $this->validate();
        $validatedData['wallet_category_id'] = $validatedData['category'];
        $validatedData['icon'] = $this->icon->store('assets','public');
        // dd
        WalletType::create($validatedData);
        $this->alert('success', 'Asset added Successfully');

        $this->name = '';
        $this->category = '';
        $this->icon = '';
        $this->symbol = '';

    }
    public function render()
    {
        return view('livewire.create-wallet-type')->layout('layouts.main');
    }
}
