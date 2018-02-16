<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebalpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webalps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('izic_id');
            $table->text('izic_name');
            $table->string('link_name');
            $table->text('date');
            $table->boolean('status');
            $table->integer('link_id');
            $table->text('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. link_name	character varying(20)

     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webalps');
    }
}
