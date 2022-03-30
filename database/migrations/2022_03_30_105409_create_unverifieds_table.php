<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnverifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unverifieds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('comment');   
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('email'); 
            $table->string('tone');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unverifieds');
    }
}
