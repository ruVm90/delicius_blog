<!-- Formulario para modificar una categoria -->
@extends('master')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Modificar categoría</h1>

        <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded-lg p-6 space-y-6">

            @csrf
            @method('PATCH')
            @include('layouts._form-category')

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-300">
                    Modificar Categoría
                </button>
            </div>
        </form>

        @include('layouts._error-forms')
    </div>
@endsection
