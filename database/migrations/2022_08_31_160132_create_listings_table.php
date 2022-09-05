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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('type');
            $table->string('asset');
            $table->string('pricing');
            $table->double('price');
            $table->double('amount');
            $table->double('value');
            $table->double('min_value');
            $table->double('max_value');
            $table->string('payment_type');
            $table->string('time');
            $table->string('term')->nullable();
            $table->string('instructions')->nullable();
            $table->boolean('available')->default(true);
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
        Schema::dropIfExists('listings');
    }
};
