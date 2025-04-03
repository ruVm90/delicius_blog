<!-- Mostrar el dashboard de las recetas-->
@extends('master')

@section('content')
<h1>Recetas de {{ $user->name }}</h1>

<ul>
    @foreach ($my_recipes as $recipe)
        <li>{{ $recipe->title }}</li>
    @endforeach
</ul>

@endsection
