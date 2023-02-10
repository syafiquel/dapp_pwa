<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    protected $listeners = ['alert' => 'alert'];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.login');
    }

    public function alert($address)
    {
        if(Auth::attempt(['wallet_address' => 'abc123']))
        {
            dd(Auth::user());
        }
    }
}
