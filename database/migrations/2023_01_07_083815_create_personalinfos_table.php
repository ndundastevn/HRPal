<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalinfos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('f_name');
            $table->string('s_name');
            $table->string('sername');
            $table->string('gender');
            $table->string('civil_status');
            $table->date('yob');
            $table->boolean('nationality');
            $table->string('country')->nullable();
            $table->string('nationality2')->nullable();
            $table->string('county')->nullable();
            $table->string('ethinicity')->nullable();
            $table->boolean('disability');
            $table->string('d_nature')->nullable();
            $table->string('d_registration')->nullable();
            $table->string('user_id');
            $table->string('e_level')->nullable();
            $table->string('e_cert')->nullable();
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
        Schema::dropIfExists('personalinfos');
    }
};
