<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipe_id');
            $table->string('product_name');            
            $table->string('rate_per_kg');
            $table->string('quantity'); 
            $table->string('rate');       
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
        Schema::dropIfExists('recipe_subs');
    }
}
