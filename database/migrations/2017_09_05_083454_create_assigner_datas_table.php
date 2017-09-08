<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignerDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigner_datas', function(Blueprint $table){
            $table->increments('id');
            $table->string('param');
            $table->longText('data');
            $table->integer('assigner_id')->unsigned();
            $table->foreign('assigner_id')->references('id')->on('assigners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('assigner_datas');
    }
}
