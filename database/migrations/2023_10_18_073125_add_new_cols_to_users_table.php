<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('profession')->nullable();
            $table->string('income')->nullable();
            $table->boolean('add_before')->nullable();
            $table->text('prefrences')->nullable();
            $table->text('add_not_show')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
