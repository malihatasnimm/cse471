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
            $table->id();  // Primary key
            $table->string('name');  // Product name
            $table->text('description')->nullable();  // Optional product description
            $table->decimal('price', 8, 2);  // Product price with 2 decimal precision
            $table->string('image')->nullable();  // Image path
            $table->integer('quantity')->default(1);  // Default product quantity
            $table->timestamps();  // Laravel's created_at and updated_at columns
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
