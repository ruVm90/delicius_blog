@extends('master')
@section('content')
@include('layouts/_error-forms')

<form action="{{route('recipe.store')}}" method="POST" enctype="multipart/form-data">

@include('layouts/_form')


<button type="submit">Crear receta</button>
</form>
@endsection

