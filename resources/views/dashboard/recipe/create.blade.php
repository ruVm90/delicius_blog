@extends('master')
@section('content')
    <div class=" p-7">
        <form class="m-auto" action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">

            @include('layouts/_form')


        </form>
    </div>
@endsection
