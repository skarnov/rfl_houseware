<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id', 4);
            $table->bigInteger('fk_category_id')->nullable();;
            $table->bigInteger('category_serial')->nullable();
            $table->string('category_name', 30);
            $table->string('url_slug', 200);
            $table->enum('category_status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('categories');
    }
}
