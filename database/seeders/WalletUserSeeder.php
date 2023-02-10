<?php

namespace Database\Seeders;

use App\Models\WalletUser;
use Illuminate\Database\Seeder;

class WalletUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = '0xB05522Cb53655bfC50826c5B79996023A68c39e8';
        WalletUser::create(['wallet_address' => $address]);
    }
}
