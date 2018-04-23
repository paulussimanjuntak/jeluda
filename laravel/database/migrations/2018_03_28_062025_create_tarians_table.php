<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->longText('desc');
            $table->string('video');
            $table->integer('posting_id')->unsigned();

            $table->foreign('posting_id')->references('id')->on('postings')->onDelete('cascade');
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
        Schema::dropIfExists('tarians');
    }
}