@extends('layouts.app')

@section('template_title')
    Cuarto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cuarto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cuartos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Precio</th>
										<th>Ubicacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuartos as $cuarto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cuarto->titulo }}</td>
											<td>{{ $cuarto->descripcion }}</td>
											<td>{{ $cuarto->precio }}</td>
											<td>{{ $cuarto->ubicacion }}</td>

                                            <td>
                                                <form action="{{ route('cuartos.destroy',$cuarto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cuartos.show',$cuarto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cuartos.edit',$cuarto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cuartos->links() !!}
            </div>
        </div>
    </div>
@endsection
