<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nombre', 100)
                ->comment('Nombre del producto')->nullable(false);
            $table->string('referencia', 15)
                ->comment('Nombre del producto')->nullable(false);
            $table->integer('precio')
                ->comment('Precio del producto')->nullable(false);
            $table->integer('peso')
                ->comment('Peso del producto')->nullable(false);
            $table->bigInteger('categoria_id')->nullable(false)
                ->comment('Id de la categoría')->unsigned();
            $table->integer('stock')
                ->comment('Cantidad del producto en bodega')->nullable(false);
            $table->timestamps();
            //FK
            $table->foreign('categoria_id')->references('id')
                ->on('categorias');
            //IDX
            $table->index("categoria_id", "fk_categoria_id_idx");

        });
    }

    /**
     * Reverse the migmodelations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
