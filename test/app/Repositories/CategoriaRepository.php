<?php

namespace App\Repositories;

use App\Models\Categoria;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    /**
     * Implementación del modelo Categoria
     *
     * @var Categoria
     */
    protected $categoria;

    /**
     * Inyección de dependencias
     *
     * @param Categoria $categoria
     */
    public function __construct(
        Categoria $categoria
    ) {
        $this->categoria = $categoria;
    }

    /**
     * Crear Categoría
     *
     * @param string $nombre
     * @return integer
     */
    public function create(
        string $nombre
    ): int {
        $categoria = new $this->categoria;
        $categoria->nombre = $nombre;
        $categoria->save();
        return $categoria->id;
    }

    /**
     * Obtener todos las Categorías
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->categoria->all();
    }

    /**
     * Obtener el Categoría por Id
     *
     * @param integer $id
     * @return Categoria
     */
    public function getById(int $categoriaId): Categoria
    {
        return $this->categoria->find($categoriaId);
    }

    /**
     * Actualizar los datos del Categoría
     *
     * @param integer $categoriaId
     * @param string $nombre
     * @return boolean
     */
    public function update(
        int $categoriaId,
        string $nombre
    ): bool {
        $categoria = $this->getById($categoriaId);
        $categoria = new $this->categoria;
        $categoria->nombre = $nombre;
        return $categoria->save();
    }

    /**
     * Eliminar Categoría
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $categoriaId): bool
    {
        $categoria = $this->getById($categoriaId);
        return $categoria->delete();
    }
}
