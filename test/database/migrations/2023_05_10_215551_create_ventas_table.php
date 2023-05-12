<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad')
                ->comment('Cantidad del producto vendido')->nullable(false);
            $table->bigInteger('producto_id')
                ->comment('Id del producto vendido')->nullable(false)
                ->unsigned();
            $table->timestamps();
            //FK
            $table->foreign('producto_id')->references('id')
                ->on('productos');
            //IDX
            $table->index("producto_id", "fk_producto_id_idx");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
