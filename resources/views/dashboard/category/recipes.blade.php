<!-- Listado de recetas segun la categoria elegida -->
@extends('master')
@section('content')
<ul>
@foreach ($recipes as $recipe)
  <li>{{$recipe->title}}</li>
    
@endforeach
</ul>
@endsection