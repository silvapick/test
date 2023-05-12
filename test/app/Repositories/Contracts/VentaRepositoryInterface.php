<?php

namespace App\Repositories\Contracts;

use App\Models\Venta;
use Illuminate\Support\Collection;

interface VentaRepositoryInterface
{
    /**
     * Crear venta
     *
     * @param integer $cantidad
     * @param integer $productoId
     * @return integer
     */

    public function create(
        int $cantidad,
        int $productoId
    ): int;

    /**
     * Obtener todos las Ventas
     *
     * @return Collection
     */
    public function getAll(): Collection;

}
