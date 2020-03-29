<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('table_id')->unsigned()->default(0);
            $table->string('name');
            $table->string('tag')->unique();
            $table->integer('data_sort')->default(1);
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
        Schema::dropIfExists('cols');
    }
}
