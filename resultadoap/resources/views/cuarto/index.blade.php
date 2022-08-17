@extends('layouts.app')

@section('template_title')
    Cuarto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <b>{{ __('Cuarto') }}</b>
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
                                    <tr bgcolor='E77319'>
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
                                            <td bgcolor='FC9A43'>{{ ++$i }}</td>
                                            
											<td bgcolor='FFAF69'>{{ $cuarto->titulo }}</td>
											<td bgcolor='FBC89B'>{{ $cuarto->descripcion }}</td>
											<td bgcolor='FFDAB9'>{{ $cuarto->precio }}</td>
											<td bgcolor='EBCCAF'>{{ $cuarto->ubicacion }}</td>

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
