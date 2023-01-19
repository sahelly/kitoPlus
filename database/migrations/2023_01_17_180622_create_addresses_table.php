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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('city_id')->constrained("cities")->onDelete('cascade')->onUpdate('cascade');
            $table->string("postal_code")->nullable();
            $table->text("address");
            $table->string("unit")->nullable();
            $table->string("recipient_first_name");
            $table->string("recipient_last_name");
            $table->string("mobile");
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
        Schema::dropIfExists('addresses');
    }
};
