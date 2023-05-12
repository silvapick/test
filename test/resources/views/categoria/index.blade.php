@extends('layout.master')

@section('content')
    <div class="col-ms-12 col-xl-12 py-md-4 bd-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>Lista de Categorías</h4>
                </li>
            </ol>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                @if( count($categorias) == 0 )
                    <tr>
                        <td colspan="2">
                            <div class="alert alert-info text-center" role="alert">
                                No existen registros de categorías.
                            </div>
                        </td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
@endsection
