<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id('newsletter_id');
            $table->string('email', 100);
            $table->enum('subscription_status', ['active', 'inactive'])->default('active');
            $table->time('create_time')->nullable();
            $table->date('create_date')->nullable();
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
        Schema::dropIfExists('newsletters');
    }
}