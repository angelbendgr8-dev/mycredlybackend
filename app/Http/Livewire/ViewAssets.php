<?php

namespace App\Http\Livewire;

use App\Models\WalletType;
use Livewire\Component;

class ViewAssets extends Component
{
    public $assets;

    public function mount($id)
    {
        $this->assets = WalletType::whereWalletCategoryId($id)->get();
    }
    public function render()
    {
        return view('livewire.view-assets')->layout('layouts.main');
    }
}
