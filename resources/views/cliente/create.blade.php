@extends('layouts.app')

@section('content')

<div class="container">


<form class="form-horizontal" method="post" action="{{url('/clientes')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('cliente.form' , ['Modo'=>'crear'])
   

</form>

</div>
@endsection
