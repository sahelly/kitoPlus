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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount',20,3)->nullable();
            $table->foreignId('user_id')->constrained("users")->onUpdate('cascade')->onDelete("cascade");
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(0)->comment('0=> offline,1=>online,2=>cash');
            $table->bigInteger('paymentable_id');
            $table->string('paymentable_type');
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
        Schema::dropIfExists('payments');
    }
};
