@extends('master')

<form action="{{ route('category.update') }}">
    @method('PATCH')
    @include('_form-category')

    <button type="submit">Modificar receta</button>

</form>    
