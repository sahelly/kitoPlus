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
        Schema::create('online_payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount',20,3)->nullable();
            $table->foreignId('user_id')->constrained("users")->onUpdate('cascade')->onDelete("cascade");
            $table->string('transaction_id')->nullable();
            $table->string('gateway')->nullable();
            $table->text("bank_first_response");
            $table->text("bank_second_response");
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('online_payments');
    }
};
