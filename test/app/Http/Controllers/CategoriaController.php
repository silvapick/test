<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller
{
    protected $categoriaRepository;

    /**
     * Inyectar dependencias
     * @param CategoriaRepository $categoriaRepository
     */
    public function __construct(
        CategoriaRepository $categoriaRepository
    ) {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index(){

        $categorias = $this->categoriaRepository->getAll();
        return view(
            'categoria.index',
            [
                'categorias' => $categorias
            ]
        );
    }
}
