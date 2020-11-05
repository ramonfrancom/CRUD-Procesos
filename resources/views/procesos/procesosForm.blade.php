@extends('layouts.app')

@section('contenido')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Informacion de Procesos</h5>
        <h1>Registro de proceso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($proceso))
            <form action="{{route('procesos.update', [$proceso]) }}" method="POST">
            @method('patch')
        @else
            <form action="{{route('procesos.store')}}" method="POST">
        @endif
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="receta_id">Receta Id:</label>
                    <input type="number" class="form-control" name="receta_id" id="receta_id" placeholder="Receta Id" value="{{old('receta_id') ?? $proceso->receta_id ?? '' }}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="posicion">Posicion:</label>
                    <input type="number" class="form-control" name="posicion" id="posicion" placeholder="Posicion" value="{{old('posicion') ?? $proceso->posicion ?? '' }}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="{{old('titulo') ?? $proceso->titulo ?? '' }}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{old('descripcion') ?? $proceso->descripcion ?? '' }}">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <a class="mb-2 mr-2 btn-transition btn btn-outline-primary" href="./">Regresar</a>
                <button class="mb-2 mr-2 btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>

    </div>
</div>
        @endsection
