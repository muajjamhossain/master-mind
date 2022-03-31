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
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('image');
            $table->integer('user_id')->nullable();
            $table->string('description')->nullable();
            $table->decimal('selling_price',10,2)->nullable();
            $table->decimal('discount_price', 10,2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('policy')->nullable();
            $table->boolean('featured')->nullable();
            $table->integer('views')->nullable();
            $table->text('tags')->nullable();
            $table->tinyInteger('best')->nullable();
            $table->tinyInteger('top')->nullable();
            $table->tinyInteger('hot')->nullable();
            $table->tinyInteger('latest')->nullable();
            $table->tinyInteger('big')->nullable();
            $table->string('features')->nullable();
            $table->string('product_condition')->nullable();
            $table->string('ship_time')->nullable();
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('youtube')->nullable();
            $table->string('type')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file')->nullable();
            $table->string('license')->nullable();
            $table->string('license_qty')->nullable();
            $table->string('link')->nullable();
            $table->string('platform')->nullable();
            $table->string('region')->nullable();
            $table->string('licence_type')->nullable();
            $table->string('measure')->nullable();
            $table->string('status')->default(1);
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
