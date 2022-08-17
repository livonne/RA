@extends('layouts.app')

@section('template_title')
    {{ $cuarto->name ?? 'Ver Cuarto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Informacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuartos.index') }}"> Atras</a>
                        </div>
                    </div>
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $cuarto->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $cuarto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            <a>$</a>{{ $cuarto->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion:</strong>
                            {{ $cuarto->ubicacion }}
                        </div>
                        <br>
                        
                        

                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection
