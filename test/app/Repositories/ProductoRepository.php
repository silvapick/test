<?php

namespace App\Repositories;

use App\Models\Producto;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\ProductoRepositoryInterface;

class ProductoRepository implements ProductoRepositoryInterface
{
    /**
     * Implementación del modelo Producto
     *
     * @var producto
     */
    protected $producto;

    /**
     * Inyección de dependencias
     *
     * @param Producto $producto
     */
    public function __construct(
        Producto $producto
    ) {
        $this->producto = $producto;
    }

    /**
     * Crear producto
     *
     * @param string $nombre
     * @param string $referencia
     * @param integer $precio
     * @param integer $peso
     * @param integer $categoriaId
     * @param integer $stock
     * @return integer
     */
    public function create(
        string $nombre,
        string $referencia,
        int $precio,
        int $peso,
        int $categoriaId,
        int $stock
    ): int {
        $producto = new $this->producto;
        $producto->nombre = $nombre;
        $producto->referencia = $referencia;
        $producto->precio = $precio;
        $producto->peso = $peso;
        $producto->categoria_id = $categoriaId;
        $producto->stock = $stock;
        $producto->save();
        return $producto->id;
    }

    /**
     * Obtener todos los productos
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->producto
            ->with(
                'categoria'
            )->get();
    }

    /**
     * Obtener el producto por Id
     *
     * @param integer $id
     * @return producto
     */
    public function getById(int $id): producto
    {
        return $this->producto->find($id);
    }

    /**
     * Actualizar los datos del Producto
     *
     * @param integer $productoId
     * @param string $nombre
     * @param string $referencia
     * @param integer $precio
     * @param integer $peso
     * @param integer $categoriaId
     * @param integer $stock
     * @return boolean
     */
    public function update(
        int $productoId,
        string $nombre,
        string $referencia,
        int $precio,
        int $peso,
        int $categoriaId,
        int $stock
    ): bool {
        $producto = $this->getById($productoId);
        $producto->nombre = $nombre;
        $producto->referencia = $referencia;
        $producto->precio = $precio;
        $producto->peso = $peso;
        $producto->categoria_id = $categoriaId;
        $producto->stock = $stock;
        return $producto->save();
    }

    /**
     * Eliminar producto
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $productoId): bool
    {
        $producto = $this->getById($productoId);
        return $producto->delete();
    }

    /**
     * Actualizar el stock Producto
     *
     * @param integer $productoId
     * @param integer $cantidad
     * @return boolean
     */
    public function updateStock(
        int $productoId,
        int $cantidad
    ): bool {
        $producto = $this->getById($productoId);
        $producto->stock = $producto->stock - $cantidad;
        return $producto->save();
    }
}
