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
            $table->string('title');
            $table->string('model');
            $table->text('description')->nullable();
            $table->string('preview_image')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable()->unsigned()->default(0);
            $table->decimal('price')->nullable()->unsigned()->default(00.00);
            $table->boolean('in_stock')->nullable()->default(false);
            $table->boolean('is_published')->nullable()->default(false);
            $table->jsonb('characteristic')->nullable();

            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->foreignId('reviews_id')->nullable();

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
