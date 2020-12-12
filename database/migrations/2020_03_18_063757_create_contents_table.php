<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id('content_id');
            $table->bigInteger('fk_content_id')->nullable();
            $table->string('content_slug')->nullable();
            $table->bigInteger('content_serial')->default(1);
            $table->string('content_title');
            $table->string('content_subtitle');
            $table->text('content_description');
            $table->text('content_misc');
            $table->text('additional_info');
            $table->string('external_link');
            $table->text('featured_image');
            $table->enum('content_status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('contents');
    }
}
