@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-warning"><b>{{ __('Bienvenido') }}</b></div>
                <center><h3>Clima en este momento</h3></center>
        <div id="cajitas"class="cascade">
                            <div id="caja1">
                                <h1 id="temperatura-valor"></h1>
                                <h1 id="temperatura-descripcion"></h1>
                            </div>

                            <div id="caja2">
                            <h2 id="ubicacion"></h2>
                            <img id="icono-animado" src="" alt="" height="128" width="128">
                            </div>
                            
                            <div id="caja3">
                            <h3>Vel. del viento</h3>
                            <h1 id="viento-velocidades"></h1>
                            </div>
                        </div>
                        <script src="{{ asset('js/clima.js') }}"></script>
                        </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
