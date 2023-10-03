<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug', 355)->index();
            $table->float('price', 11, 2);
            $table->float('old_price', 11, 2)->nullable();
            $table->tinyInteger('discount_type')->nullable()->comment('0=regular,1=percent');
            $table->float('discount', 11, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('featured')->nullable();
            $table->integer('new')->nullable();
            $table->integer('p_set')->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active,2=pending');
            $table->longText('description')->nullable();
            $table->string('display');
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
        Schema::dropIfExists('products');
    }
}
