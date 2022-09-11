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
        Schema::create('tradings', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->double('price');
            $table->string('account_name')->nullable();
            $table->string('trans_id');
            $table->foreignId('listing_id');
            $table->foreignId('user_id');
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('tradings');
    }
};
