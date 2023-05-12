<?php

namespace App\Repositories\Contracts;

use App\Models\Producto;
use Illuminate\Support\Collection;

interface ProductoRepositoryInterface
{
    /**
     * Crear Producto
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
    ): int;

    /**
     * Obtener todos los Productos
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Obtener el Producto por Id
     *
     * @param integer $id
     * @return Producto
     */
    public function getById(int $id): Producto;


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
    ): bool;

    /**
     * Eliminar Producto
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $productoId): bool;

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
        ): bool;
}
