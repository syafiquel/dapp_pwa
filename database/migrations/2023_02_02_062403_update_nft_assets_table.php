<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNftAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nft_assets', function (Blueprint $table) {
            $table->foreign('collection_id')->references('id')->on('nft_collections')->onDelete('cascade');
            $table->foreign('wallet_user_id')->references('id')->on('wallet_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
