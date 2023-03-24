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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('logo')->nullable();
            $table->string('tur')->nullable();
            $table->string('url')->nullable();        
            $table->integer('durum')->default(0);
            $table->integer('cat_id')->default(0);
            $table->integer('pop')->default(0);          
            $table->timestamps();  
            $table->foreign('cat_id')
            ->references('id')
            ->on('menus');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
