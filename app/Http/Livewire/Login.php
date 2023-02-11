<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{


    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.login');
    }

}
