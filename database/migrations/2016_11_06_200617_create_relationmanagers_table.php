<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationmanagers', function (Blueprint $table) {
            $table->increments('id_rm');
            $table->string('vl_rm');
            $table->string('nm_rm');
            $table->string('status_rm');
            $table->boolean('sexe_rm');
            $table->string('email_rm');
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
        Schema::drop('relationmanagers');
    }
}
