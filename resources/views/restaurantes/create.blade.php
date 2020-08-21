@extends('layouts.app')

@section('content')

<div class="container">


<form class="form-horizontal" method="post" action="{{url('/restaurantes')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('restaurantes.form' , ['Modo'=>'crear'])
   

</form>

</div>
@endsection
