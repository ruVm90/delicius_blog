@extends('master')
@section('content')

<h1>AQUI VA EL LISTADO DE LAS RECETAS</h1>
<ul>
       @foreach ($recipes as $recipe)
       <li>{{ $recipe->title }}</li>

       @endforeach
</ul>
<p>holi</p>
@endsection