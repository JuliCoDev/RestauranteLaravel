 <div class="form-group">

    <label class="control-label"  for="Nombre">{{'Nombre'}}</label>
    <input class="form-control {{$errors->has('Nombre') ? 'is-invalid' : ''}} " type="text" name="Nombre" id="Nombre" 
        value="{{isset($restaurante->Nombre)?$restaurante->Nombre : old('Nombre')}}"
    > 

</div>
<
}

    <input class="btn btn-success" type="submit" value="{{$Modo == 'crear' ? 'Agregar' : 'Modificar' }}">

    <a class="btn btn-primary" href="{{ url('restaurantes') }}">Regresar</a>