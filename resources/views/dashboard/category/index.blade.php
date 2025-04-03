@extends('master')

@section('content')



<h1>Listado de categorias</h1>

<ul>
@foreach ($categories as $category)
      <li>{{$category->category_name}}</li>
    
@endforeach
</ul>    

@endsection