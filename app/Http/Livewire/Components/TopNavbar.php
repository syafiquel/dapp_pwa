<?php

namespace App\Http\Livewire\Components;
use App\Models\WalletUser;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class TopNavbar extends Component
{

    public $wallet_address;
    protected $listeners = ['send-wallet-address' => 'checkAuth', 'wallet-disconnect' => 'walletDisconnect'];

    public function checkAuth($address)
    {
        if(!WalletUser::where('wallet_address', $address)->exists())
        {
            WalletUser::create([
                'wallet_address' => $address,
                'is_wallet_connect' => 1
            ]);

        }

        else
        {
           $wallet_user = WalletUser::where('wallet_address', $address)->first();
           if(!$wallet_user->is_wallet_connect)
           {
               $wallet_user->is_wallet_connect = 1;
               $wallet_user->save();
           }
        }
        if(Auth::attempt(['wallet_address' => $address]))
        {
            $user = Auth::user();
            Auth::login($user);
        }
    }

    public function walletDisconnect($address)
    {
        $wallet_user = WalletUser::where('wallet_address', $address)->first();
        $wallet_user->is_wallet_connect = 0;
        $wallet_user->save();
    }

    public function verifyAuth()
    {
        /*dd($this->wallet_address);









































        if(Auth::check())
            dd('Auth');
        else
            dd(Auth::user());*/
        return redirect()->to('https://dapp.sdc.cx/sdc/portal');
    }

    public function render()
    {
        return view('livewire.components.top-navbar');
    }
}
