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
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('tur')->nullable();
            $table->integer('fav_id');  
            $table->integer('durum')->default(0); 
            $table->timestamps(); 
            $table->integer('pop')->default(0); 
            $table->foreign('fav_id')
            ->references('id')
            ->on('menus'); 
            $table->foreign('fav_id')
            ->references('id')
            ->on('writers');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
