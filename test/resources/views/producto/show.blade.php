@extends('layout.master')

@section('content')
    <div class="col-ms-12 col-xl-12 py-md-4 bd-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                        Lista de Productos
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="/producto">Agregar Producto</a>
                </li>
            </ol>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <th scope="row">{{ $producto->nombre }}</th>
                        <td>{{ $producto->referencia }}</td>
                        <td>$ {{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->peso }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <a class="btn btn-outline-info"
                                href="/producto/{{ $producto->id }}/edit"
                                role="button">Editar</a>
                        </td>
                        <td>
                            <form class="form-delete"
                                action="{{ route('producto.delete', $producto->id) }}"
                                method="GET">
                                <button type="submit" class="btn btn-outline-danger btn-drop">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                @if( count($productos) == 0 )
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-info text-center" role="alert">
                                No existen registros de productos.
                            </div>
                        </td>
                    </tr>
                @endif
                @if($errors->any())
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-danger text-center" role="alert">
                                <strong>¡Atención!</strong> {{$errors->first()}}
                            </div>
                        </td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
@endsection
<script>
    (function() {

        window.addEventListener('load', function() {

            $('.form-delete').on('submit', function(){

                let borrar = confirm( '¿Desea eliminar el producto?' )

                if( !borrar ){
                    event.preventDefault();
                    event.stopPropagation();
                    return false
                }
                return true
            })

        }, false)
    })()
</script>
