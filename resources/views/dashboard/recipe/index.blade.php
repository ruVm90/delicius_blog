@extends('master')
@section('content')
<h1 class="bg-white" >AQUI VA EL LISTADO DE LAS RECETAS</h1>
<ul>
@foreach ($recipes as $recipe)
       <li class="bg-white">{{ $recipe->title }}</li>
    
@endforeach
</ul>
@endsection