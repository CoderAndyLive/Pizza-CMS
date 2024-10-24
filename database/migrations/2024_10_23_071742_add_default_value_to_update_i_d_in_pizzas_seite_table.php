<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToUpdateIDInPizzasSeiteTable extends Migration
{
    public function up()
    {
        Schema::table('pizzas_seite', function (Blueprint $table) {
            $table->integer('updateID')->default(0)->change(); // Set a default value for updateID
        });
    }

    public function down()
    {
        Schema::table('pizzas_seite', function (Blueprint $table) {
            $table->integer('updateID')->default(null)->change(); // Revert the change if needed
        });
    }
}
