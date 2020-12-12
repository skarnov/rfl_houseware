<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markers', function (Blueprint $table) {
            $table->id('storelocator_id', 6);
            $table->string('name', 30);
            $table->string('phone', 20)->nullable();
            $table->string('country', 10)->nullable();
            $table->string('state', 30)->nullable();
            $table->string('state_id', 40)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->float('latitude', 10,6);
            $table->float('longtitude', 10,6);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('address')->nullable();
            $table->string('city', 50)->nullable();
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
        Schema::dropIfExists('markers');
    }
}
