<?php

namespace App\Http\Livewire\Components;
use App\Models\WalletUser;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class TopNavbar extends Component
{

    protected $listeners = ['send-wallet-address' => 'checkAuth'];

    public function checkAuth($address)
    {
        if(!WalletUser::where('wallet_address', $address)->exists())
        {
            WalletUser::create([
                'wallet_address' => $address
            ]);
            
        }

        if(Auth::attempt(['wallet_address' => $address]))
        {
            $user = Auth::user();
            Auth::login($user);
           
        }
        
    }

    public function verifyAuth()
    {
        if(Auth::check())
            dd('Auth');
        else
            dd(Auth::user());
    }

    public function render()
    {
        return view('livewire.components.top-navbar');
    }
}
