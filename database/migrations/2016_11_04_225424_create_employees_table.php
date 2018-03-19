<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id_kl');
            $table->string('gebrnm_kl');
            $table->string('vl_kl');
            $table->string('email_kl');
            $table->string('pw_kl');
            $table->string('tel_kl');
            $table->boolean('sexe_kl');
            $table->integer('id_bd');
            $table->boolean('premium_kl');
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
        Schema::drop('employees');
    }
}
