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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

//            $table->foreignId('current_team_id')->nullable();

            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('national_code')->nullable()->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('profile_photo_path')->nullable()->comment("avatar");

            $table->tinyInteger('activation')->default(0)->comment('0=>inactive , 1=>active');
            $table->timestamp('activation_date')->nullable();
            $table->tinyInteger('user_type')->default(0)->comment('0=>user , 1=>admin');
            $table->tinyInteger('status')->default(0);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
