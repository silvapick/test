@extends('layout.master')

@section('content')

@php
    $id = $nombre = $referencia = $precio = $peso = $categoriaId = $stock = '';
    $route = route('producto.store');
    $method = 'POST';
    $titulo = 'Agregar';

    if( !empty( $producto ) ){

        $route = route('producto.update', $producto->id);
        $method = 'POST';
        $titulo = 'Editar';
        $id = $producto->id;
        $nombre = $producto->nombre;
        $referencia = $producto->referencia;
        $precio = $producto->precio;
        $peso = $producto->peso;
        $categoriaId = $producto->categoria_id;
        $stock = $producto->stock;
    }

@endphp

    <div class="col-ms-12 col-xl-12 py-md-4 bd-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>{{ $titulo }} Producto</h4>
                </li>
            </ol>
        </nav>

        <form class="form-producto" method="{{ $method }}"
            action="{{ $route }}" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required
                        value="{{ $nombre }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="referencia">Referencia *</label>
                    <input type="text" class="form-control" name="referencia" id="referencia" required
                    value="{{ $referencia }}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="precio">Precio *</label>
                    <input type="number" min="1" class="form-control" name="precio" id="precio" required
                    value="{{ $precio }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="peso">Peso *</label>
                    <input type="number" min="1" class="form-control" name="peso" id="peso" required
                    value="{{ $peso }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="categoria">Categoría *</label>
                    <select class="custom-select" name="categoria" id="categoria" required>
                        <option selected value="">Seleccione...</option>

                        @foreach($categorias as $categoria)

                            @php $selected = ''; @endphp

                            @if($categoriaId == $categoria->id)
                                @php $selected = 'selected'; @endphp
                            @endif

                            <option {{ $selected }} value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="stock">Stock *</label>
                    <input type="number" min="1" class="form-control" name="stock" id="stock" required
                    value="{{ $stock }}">
                </div>
            </div>
            <div class="text-center">
                @if($errors->any())
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>¡Atención!</strong> {{$errors->first()}}
                    </div>
                @endif
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>

    </div>
@endsection

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = $('.form-producto');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call( forms, function( form ) {

            form.addEventListener('submit', function( event ) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
        }, false);
    })();

</script>
