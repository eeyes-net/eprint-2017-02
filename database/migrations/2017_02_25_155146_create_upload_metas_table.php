<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upload_id');
            $table->foreign('upload_id')->references('id')->on('uploads');
            $table->string('name', 200)->index();
            $table->longText('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_metas');
    }
}
