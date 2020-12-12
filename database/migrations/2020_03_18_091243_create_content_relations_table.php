<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_relations', function (Blueprint $table) {
            $table->id('relation_id');
            $table->bigInteger('page_id');
            $table->string('page_section');
            $table->bigInteger('content_id');
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
        Schema::dropIfExists('content_relations');
    }
}
