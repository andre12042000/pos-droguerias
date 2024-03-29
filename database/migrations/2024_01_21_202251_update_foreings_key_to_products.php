<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeingsKeyToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratorio_id')->nullable();
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('set null');

            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions')->onDelete('set null');

            $table->unsignedBigInteger('presentacion_id')->nullable();
            $table->foreign('presentacion_id')->references('id')->on('presentacions')->onDelete('set null');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->unsignedBigInteger('subcategoria_id')->nullable();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
