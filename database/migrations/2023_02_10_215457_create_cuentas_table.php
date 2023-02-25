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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc')->unique();
            $table->string('razonSocial');

            
            $table->boolean('estado')->nullable();

            $table->unsignedBigInteger('catcuentas_id')->nullable();
            $table->string('tipoFacturacion');


            $table->foreign('catcuentas_id')
                    ->references('id')
                    ->on('catcuentas')
                    ->onDelete('set null')
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
        Schema::dropIfExists('cuentas');
    }
};
