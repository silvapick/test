<?php

namespace App\UseCases\Ventas;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\UseCases\Contracts\VentaUseCaseInterface;
use Illuminate\Database\QueryException;

class VentaUseCase implements VentaUseCaseInterface
{
    /**
     * Implementación de ProductoRepository
     *
     * @var ProductoRepository
     */
    protected $productoRepository;

    /**
     * Inyección de dependencia
     *
     * @param ProductoRepository $productoRepository
     */

    public function __construct(
        ProductoRepository $productoRepository
    ) {
        $this->productoRepository = $productoRepository;
    }

    /**
     * Comparar cantidad a vender con stock
     *
     * @param Request $request
     * @return integer
     */
    public function handle(Request $request): array
    {

        $return = [];
        $return['return'] = true;
        // Consulto producto
        $producto = $this->productoRepository->getById($request->producto);

        $cantidad = $request->cantidad;

        // Comparo que la cantidad a comprar sea menor o igual al stock
        if ( $producto->stock < $cantidad) {

            $return['error'] = "No hay stock suficiente para la cantidad a comprar" ;

            $return['return'] = false;

        } else {

            $this->productoRepository->updateStock($request->producto, $cantidad);
        }

        return $return;
    }
}
