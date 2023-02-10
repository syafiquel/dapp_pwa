<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNftSmartContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nft_smart_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('network_name')->default('matic');
            $table->string('address');
            $table->boolean('is_mainnet')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nft_smart_contracts');
    }
}
