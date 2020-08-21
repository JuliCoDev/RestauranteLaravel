
@extends('layouts.app')

@section('content')

<div class="container">
    @if (Session::has('Mensaje'))    
        <div class="alert alert-success" role="alert">
            {{Session :: get('Mensaje')}}
        </div>
    @endif


    <a href="{{ url('restaurantes/create') }}" class="btn btn-success">Agregar Restaurante</a>
    <br/>
    <br/>
    <table class="table table-light table-hover">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($restaurantes as $restaurante)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$restaurante->Nombre}}</td>
                    <td>{{$restaurante->Descripcion}}</td>
                    <td>{{$restaurante->Direccion}}</td>
                    <td>{{$restaurante->Ciudad}}</td>
                    <td>
                        <img  src=" {{asset('storage').'/'.$restaurante->Foto}}"  class="img-thumbnail img-fluid" alt="" width="200">                               
                    </td>


                    <td>
                        <a class="btn btn-warning" href="{{url('/restaurantes/'.$restaurante->id .'/edit')}}">Editar</a>
                                        
                        <form method="post" action="{{ url('/restaurantes/'.$restaurante->id) }}" style="display:inline">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger" type="submit" onClick="return confirm('¿Está seguro de que quiere borrar el registro?')" >Borrar</button>
                        </form>

                        <a class="btn btn-primary btn-block" style="margin-top : 5px" href="{{url('/reservas/'.$restaurante->id .'/create')}}">
                            Hacer una reserva
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{$restaurantes->links()}}
</div>
@endsection


