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
            $table->id('product_id');
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('subcategory_id')->nullable();
            $table->bigInteger('item_id')->nullable();
            $table->string('product_name');
            $table->string('url_slug');
            $table->text('product_sizes')->nullable();
            $table->string('product_dimension')->nullable();
            $table->string('product_unit')->nullable();
            $table->string('product_barcode')->nullable();
            $table->text('product_colors')->nullable();
            $table->text('product_summary')->nullable();
            $table->text('product_image');
            $table->text('additional_images')->nullable();
            $table->text('product_material')->nullable();
            $table->text('product_care')->nullable();
            $table->text('product_video')->nullable();
            $table->text('external_link')->nullable();
            $table->double('product_price')->nullable();
            $table->double('promotional_price')->nullable();
            $table->text('product_description')->nullable();
            $table->text('barcode_info')->nullable();
            $table->enum('product_attribute', ['normal', 'featured', 'top-sale'])->default('normal');
            $table->enum('product_status', ['active', 'inactive'])->default('active');
            $table->time('create_time')->nullable();
            $table->date('create_date')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->time('modify_time')->nullable();
            $table->date('modify_date')->nullable();
            $table->bigInteger('modified_by')->nullable();
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
