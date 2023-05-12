<?php

namespace App\Repositories;

use App\Models\Venta;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\VentaRepositoryInterface;

class VentaRepository implements VentaRepositoryInterface
{
    /**
     * Implementación del modelo Venta
     *
     * @var Venta
     */
    protected $venta;

    /**
     * Inyección de dependencias
     *
     * @param Venta $venta
     */
    public function __construct(
        Venta $venta
    ) {
        $this->venta = $venta;
    }

    /**
     * Crear Venta
     *
     * @param integer $cantidad
     * @param integer $productoId
     * @return integer
     */
    public function create(
        int $cantidad,
        int $productoId
    ): int {
        $venta = new $this->venta;
        $venta->cantidad = $cantidad;
        $venta->producto_id = $productoId;
        $venta->save();
        return $venta->id;
    }

    /**
     * Obtener todos las Ventas
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->venta->all();
    }
}
