<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VentaRepository;
use App\Repositories\ProductoRepository;
use App\Http\Requests\VentaRequest;
use App\UseCases\Ventas\VentaUseCase;
use Symfony\Component\Console\EventListener\ErrorListener;

class VentaController extends Controller
{

    protected $ventaRepository;
    protected $productoRepository;
    protected $ventaUseCase;

    /**
     * Inyectar dependencias
     * @param VentaRepository $ventaRepository
     * @param ProductoRepository $productoRepository
     * @param VentaUseCaseInterface $ventaUseCase
     */

    public function __construct(
        VentaRepository $ventaRepository,
        ProductoRepository $productoRepository,
        VentaUseCase $ventaUseCase
    ) {
        $this->ventaRepository = $ventaRepository;
        $this->productoRepository = $productoRepository;
        $this->ventaUseCase = $ventaUseCase;
    }

    public function index(){

        $productos = $this->productoRepository->getAll();

        return view(
            'venta.index',
            [
                'productos' => $productos
            ]
        );
    }

    public function store(VentaRequest $request){

        $venta = $this->ventaUseCase->handle( $request );

        $this->ventaRepository->create(
            $request->cantidad,
            $request->producto
        );

        return redirect('/productos');
    }
}
