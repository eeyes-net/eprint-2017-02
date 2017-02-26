<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_order', function (Blueprint $table) {
            $table->integer('upload_id');
            $table->foreign('upload_id')->references('id')->on('uploads');
            $table->integer('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->primary(['upload_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_order');
    }
}
