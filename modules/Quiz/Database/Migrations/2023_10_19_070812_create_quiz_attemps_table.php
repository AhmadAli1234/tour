<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_attemps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('quiz_id')->nullable();
            $table->string('advertisement_ids')->nullable();
            $table->string('answer')->nullable();
            $table->boolean('result')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('quiz_attemps');
    }
};
