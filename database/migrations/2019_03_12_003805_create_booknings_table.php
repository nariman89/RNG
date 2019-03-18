<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booknings', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('article_id')->unsigned();
            $table->string('name');
            $table->text('adress');
            $table->text('city_name')->unsigned();
            $table->bigInteger('phone');
            $table->string('email')->unique();
            $table->date('date_start');
            $table->date('date_end');
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
        Schema::dropIfExists('booknings');
    }
}
