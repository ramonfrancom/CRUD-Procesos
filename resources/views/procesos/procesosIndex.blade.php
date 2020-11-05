@extends('layouts.app')

@section('contenido')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Informacion de Procesos</h5>
        <a class="mb-2 mr-2 btn btn-primary" href={{route('procesos.create')}}>Crear nuevo proceso</a>
    <table class="mb-0 table table-borderless">
        <thead>
            <tr>
                <th>Id</th>
                <th>Receta Id</th>
                <th>Posicion</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($procesos as $proceso)
            <tr>
                <td>{{ $proceso->id }}</td>
                <td>{{ $proceso->receta_id }}</td>
                <td>{{ $proceso->posicion }}</td>
                <td>{{ $proceso->titulo }}</td>
                <td>{{ $proceso->descripcion }}</td>
                <td><a href={{route('procesos.edit', [$proceso->id])}} ><div class="font-icon-wrapper"><i class="fa fa-edit" />  </div></a></td>
                <td>
                    <form action="{{route('procesos.destroy', [$proceso]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-link"><div class="font-icon-wrapper"><i class="pe-7s-trash"></i></div></button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
@endsection
