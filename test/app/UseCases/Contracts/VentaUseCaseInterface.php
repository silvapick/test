<?php

namespace App\UseCases\Contracts;

use Illuminate\Http\Request;

interface VentaUseCaseInterface
{

    /**
     * Comparar cantidad a vender con stock
     *
     * @param Request $request
     * @return integer
     */
    public function handle(Request $request): array;
}
