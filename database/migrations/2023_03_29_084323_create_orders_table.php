<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->longText('shipping_address')->nullable();
            $table->longText('billing_info')->nullable();
            $table->foreignId('pay_options_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('delivery_status')->default(0)->comment('0=pending,1=confirmed,2=packed,3=shipped,4=delivered,5=cancle');
            $table->foreignId('shipping_options_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('payment_status')->default(0)->comment('0=pending,1=review,2=invalid,3=completed,4=unpaid');;
            $table->float('grand_total',20,2)->nullable();
            $table->float('total',20,2)->nullable();
            $table->float('coupon_discount',20,2)->nullable();
            $table->string('code')->nullable();
            $table->string('tracking_code')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('trns_id')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('viewed')->default(0);
            $table->tinyInteger('delivery_viewed')->default(0);
            $table->integer('payment_status_viewed')->default(0);
            $table->float('shipping_charge')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 =pending, 1=delivered, 2 =canceled');
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
        Schema::dropIfExists('orders');
    }
}
