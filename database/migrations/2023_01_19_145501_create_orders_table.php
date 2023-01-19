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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->LongText('address_object')->nullable();
            $table->foreignId('payment_id')->constrained('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->LongText('payment_object')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);

            $table->foreignId('delivery_id')->constrained('deliveries')->onUpdate('cascade')->onDelete('cascade');
            $table->LongText('delivery_object')->nullable();
            $table->decimal('delivery_amount',20,3)->nullable(0);
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date')->nullable(0);
            $table->decimal('order_final_amount',20,3)->nullable(0);
            $table->decimal('order_discount_amount',20,3)->nullable(0);

            $table->foreignId('copan_id')->constrained('copans')->onUpdate('cascade')->onDelete('cascade');
            $table->LongText('copan_object')->nullable();
            $table->decimal('order_copan_discount_amount',20,3)->nullable(0);

            $table->foreignId('common_discount_id')->constrained('common_discounts')->onUpdate('cascade')->onDelete('cascade');
            $table->LongText('common_discount_object')->nullable();
            $table->decimal('order_common_discount_amount',20,3)->nullable(0);
            $table->decimal('order_total_products_discount_amount',20,3)->nullable(0);
            $table->tinyInteger('order_status')->default(0);

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
        Schema::dropIfExists('orders');
    }
};
