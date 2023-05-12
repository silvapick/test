@extends('layout.master')

@section('content')
    <div class="col-ms-12 col-xl-12 py-md-4 bd-content">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="query1">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Producto que mas stock tiene
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="query1" data-parent="#accordionExample">
                    <div class="card-body">
                        <code>
                            <strong>SELECT</strong> id, nombre, stock<br>
                            <strong>FROM</strong> productos<br>
                            <strong>ORDER BY</strong> stock DESC<br>
                            <strong>LIMIT 1</strong>;
                        </code>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="query2">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            producto con mayor cantidad de ventas
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="query2" data-parent="#accordionExample">
                    <div class="card-body">
                        <code>
                            <strong>SELECT</strong> p.id, p.nombre, SUM(v.cantidad)<br>
                            <strong>FROM</strong> productos AS p<br>
                            <strong>JOIN</strong> ventas AS v ON ( v.producto_id = p.id )<br>
                            <strong>GROUP BY</strong> p.id<br>
                            <strong>ORDER BY</strong> sum(v.cantidad) DESC<br>
                            <strong>LIMIT 1</strong>;<br>
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
