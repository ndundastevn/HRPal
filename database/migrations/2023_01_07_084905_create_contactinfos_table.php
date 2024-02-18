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
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('town');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('residence');
            $table->string('user_id');
            $table->string('kin_name')->nullable();
            $table->string('kin_gender')->nullable();
            $table->string('kin_relationship')->nullable();
            $table->string('kin_phone')->nullable();
            $table->string('kin_residence')->nullable();
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
        Schema::dropIfExists('contactinfos');
    }
};
