<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->string('Men_Id');
            $table->string('Rec_Id');
            $table->string('Men_Titulo');
            $table->string('Men_Desc');
            $table->string('Men_Icono');
            $table->string('Men_Tipo');
            $table->float('Men_Orden', 8, 2);
            $table->string('Men_Estado');

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
        Schema::dropIfExists('menus');
    }
}
