<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1=flat,2=>category,3=brand,4=products');
            $table->integer('limit');
            $table->string('code')->unique();
            $table->integer('amount');
            $table->tinyInteger('amount_type')->default(1)->comment('1=Amount,1=Percent');
            $table->date('expires_at');
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
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
        Schema::dropIfExists('coupons');
    }
}
