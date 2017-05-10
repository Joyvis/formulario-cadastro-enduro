<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name', 150);
            $table->string('motorcycle', 150);
            $table->string('team', 120)->nullable();
            $table->string('sponsors', 255)->nullable();
            $table->string('image', 255);        
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
        Schema::dropIfExists('competitors');
    }
}
