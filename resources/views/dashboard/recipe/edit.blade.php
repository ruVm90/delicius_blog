@extends('master')
@section('content')
<div class=" p-7">
<form action="{{route('recipe.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">

    @method('PATCH')
    @include('layouts/_form')

</form>
</div>   
   
@endsection

