 
 <div class="form-group">

    <label class="control-label"  for="Nombre">{{'Nombre'}}</label>
    <input class="form-control {{$errors->has('Nombre') ? 'is-invalid' : ''}} " type="text" name="Nombre" id="Nombre" 
        value="{{isset($restaurante->Nombre)?$restaurante->Nombre : old('Nombre')}}"
    > 
    
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
     
</div>
    

<div class="form-group">
  
    <label class="control-label" for="Descripción">{{'Descripción'}}</label>
    <input class="form-control {{$errors->has('Descripcion') ? 'is-invalid' : ''}} " type="text" name="Descripcion" id="Descripcion" 
        value="{{isset($restaurante->Descripcion)?$restaurante->Descripcion : old('Descripcion')}}"
    > 
    
    {!! $errors->first('Descripcion','<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">
  
    <label class="control-label" for="Dirección">{{'Dirección'}}</label>
    <input class="form-control {{$errors->has('Direccion') ? 'is-invalid' : ''}} " type="text" name="Direccion" id="Direccion" 
        value="{{isset($restaurante->Direccion)?$restaurante->Direccion : old('Direccion')}}"
    > 
    
    {!! $errors->first('Direccion','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
  
    <label class="control-label" for="Ciudad">{{'Ciudad'}}</label>
    <input class="form-control {{$errors->has('Ciudad') ? 'is-invalid' : ''}} " type="text" name="Ciudad" id="Ciudad" 
        value="{{isset($restaurante->Ciudad)?$restaurante->Ciudad : old('Ciudad')}}"
    > 
    
    {!! $errors->first('Ciudad','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">

    <label class="control-label" for="Foto">{{'Foto'}}</label>
    
    @if(isset($restaurante->Foto))
        </br>
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$restaurante->Foto}}" alt="" width="200"> 
        </br>
    @endif
    
    <input class="form-control {{$errors->has('Foto') ? 'is-invalid' : ''}} " type="file" name="Foto" id="Foto" 
        value="{{isset($restaurante->Foto)?$restaurante->Foto : old('Foto')}}"
    > 
    
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}

</div>

<input class="btn btn-success" type="submit" value="{{$Modo == 'crear' ? 'Agregar' : 'Modificar' }}">

<a class="btn btn-primary" href="{{ url('restaurantes') }}">Regresar</a>