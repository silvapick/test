<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Repositories\CategoriaRepository;

class ProductoController extends Controller
{
    protected $productoRepository;
    protected $categoriaRepository;

    /**
     * Inyectar dependencias
     * @param ProductoRepository $productoRepository
     * @param CategoriaRepository $categoriaRepository
     */

    public function __construct(
        ProductoRepository $productoRepository,
        CategoriaRepository $categoriaRepository
    ) {
        $this->productoRepository = $productoRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

    public function show(){
        $productos = $this->productoRepository->getAll();

        return view(
            'producto.show',
            [
                'productos' => $productos
            ]
        );
    }

    public function index(){

        $categorias = $this->categoriaRepository->getAll();
        return view(
            'producto.index',
            [
                'categorias' => $categorias
            ]
        );
    }

    public function store(ProductoRequest $request){

        $this->productoRepository->create(
            $request->nombre,
            $request->referencia,
            $request->precio,
            $request->peso,
            $request->categoria,
            $request->stock
        );

        return $this->show();
    }

    public function destroy(int $productoId){

        $this->productoRepository->delete(
            $productoId
        );

        return $this->show();
    }

    public function edit(int $productoId){

        $producto = $this->productoRepository->getById($productoId);
        $categorias = $this->categoriaRepository->getAll();

        return view(
            'producto.index',
            [
                'producto' => $producto,
                'categorias' => $categorias
            ]
        );
    }

    public function update(ProductoRequest $request){

        $this->productoRepository->update(
            $request->id,
            $request->nombre,
            $request->referencia,
            $request->precio,
            $request->peso,
            $request->categoria,
            $request->stock
        );

        return $this->show();
    }
}
