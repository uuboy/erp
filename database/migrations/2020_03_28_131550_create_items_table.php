<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('table_id')->unsigned()->default(0);
            $table->bigInteger('col_id')->unsigned()->default(0);
            $table->bigInteger('row_id')->unsigned()->default(0);
            $table->bigInteger('int_val')->nullable();
            $table->double('float_val')->nullable();
            $table->text('text_val')->nullable();
            $table->date('date_val')->nullable();
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
        Schema::dropIfExists('items');
    }
}
