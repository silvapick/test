<?php

namespace App\Repositories\Contracts;

use App\Models\Categoria;
use Illuminate\Support\Collection;

interface CategoriaRepositoryInterface
{
    /**
     * Crear Categoría
     *
     * @param string $nombre
     * @return integer
     */

    public function create(
        string $nombre
    ): int;

    /**
     * Obtener todos los Categorías
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Obtener la categoría por Id
     *
     * @param integer $id
     * @return Categoria
     */
    public function getById(int $id): Categoria;


    /**
     * Actualizar los datos de la categoría
     *
     * @param integer $categoriaId
     * @param string $nombre
     * @return boolean
     */
    public function update(
        int $categoriaId,
        string $nombre
    ): bool;

    /**
     * Eliminar Categoría
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $categoriaId): bool;
}
