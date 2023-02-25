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
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();
            
            $table->string('nomSede',60);
            $table->string('direccion',100);
            $table->string('metraje',10)->nullable();

            $table->unsignedBigInteger('alcances_id');
            $table->unsignedBigInteger('cuenta_id');

            $table  ->foreign('alcances_id')
                    ->references('id')
                    ->on('alcances')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                    
            $table->foreign('cuenta_id')
                    ->references('id')
                    ->on('cuentas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('sedes');
    }
};
