@extends('layout.master')

@section('content')
    <div class="col-ms-12 col-xl-12 py-md-4 bd-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>Comprar Producto</h4>
                </li>
            </ol>
        </nav>

        <form class="form-producto" method="POST"
            action="{{ route('venta.store') }}" novalidate>
            @csrf
            <div class="form-row">
                <div class="col-md-9 mb-3">
                    <label for="producto">Producto *</label>
                    <select class="custom-select" name="producto" id="producto" required>
                        <option selected value="">Seleccione...</option>

                        @foreach($productos as $producto)

                            <option data-stock="{{ $producto->stock }}" value="{{ $producto->id }}">
                                {{ $producto->nombre }}
                            </option>

                        @endforeach

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cantidad">Cantidad *</label>
                    <input type="number" min="1" class="form-control" name="cantidad" id="cantidad" required>
                    <input type="hidden" name="stock" id="stock">
                </div>
            </div>
            <div class="text-center">
                @if($errors->any())
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>¡Atención!</strong> {{$errors->first()}}
                    </div>
                @endif
                <div class="text-center msgCantidad" style="display:none;">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>¡Atención!</strong> No hay stock suficiente para la cantidad a comprar.
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Comprar</button>
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

                    let stock = $('#producto option:selected').data('stock')
                    let cantidad = $('#cantidad').val()

                    console.log(stock)

                    if(stock < cantidad){
                        event.preventDefault()
                        event.stopPropagation()
                        $('.msgCantidad').show()
                    }
                }, false);
            });

        }, false);
    })();

</script>
