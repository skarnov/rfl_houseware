<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id('page_id');
            $table->string('page_slug');
            $table->string('page_name', 20);
            $table->string('page_type', 30);
            $table->enum('page_status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('pages');
    }
}
