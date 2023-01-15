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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->text('body');
            $table->foreignId('parent_id')->constrained('comments');
            $table->foreignId('auther_id')->constrained('users');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

            $table->tinyInteger('seen')->default(0)->comment('o=>unseen , 1=>seen');
            $table->tinyInteger('approved')->default(0)->comment('o=>not approved , 1=>approved');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
