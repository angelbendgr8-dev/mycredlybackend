<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('wallet_type_id')->constrained('wallet_types');
            $table->foreignId('wallet_category_id')->constrained('wallet_categories');
            $table->string('name');
            $table->double('balance')->default(0.0);
            $table->string('mnemonic')->nullable();
            $table->string('xpub')->nullable();
            $table->string('address1');
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
        Schema::dropIfExists('wallets');
    }
};
