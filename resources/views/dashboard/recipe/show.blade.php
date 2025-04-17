@extends('master')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 font-sans">
        {{-- Imagen --}}
        <div class="mb-6">
            <img src="{{ asset('storage/' . $recipe->image) }}" 
                 alt="{{ $recipe->title }}"
                 class="w-full mx-auto rounded-xl shadow-lg object-cover aspect-video">
        </div>

        {{-- Título principal --}}
<div class="mb-4">
    <h1 class="text-4xl font-extrabold uppercase text-gray-900 mb-3">
        {{ $recipe->title }}
    </h1>

    {{-- Etiquetas: dificultad + categoría --}}
    <div class="flex flex-wrap items-center gap-2 mb-2">
        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
            {{ $recipe->difficulty }}
        </span>
        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
            {{ $recipe->category->category_name }}
        </span>
    </div>

    {{-- Autor y fecha --}}
    <div class="text-sm text-gray-500">
        por <strong>{{ $recipe->user->name }}</strong> · 
        Actualizado el {{ $recipe->updated_at->translatedFormat('d \d\e F \d\e Y') }}
    </div>
</div>


        {{-- Ingredientes --}}
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Ingredientes:</h3>
            <ul class="list-disc list-inside space-y-1 text-gray-600">
                @foreach ($recipe->ingredients as $ingredient )
                    <li>{{ $ingredient->name }}</li>
                @endforeach
            </ul>
        </div>

        {{-- Elaboración --}}
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Elaboración:</h3>
            <p class="text-gray-700 leading-relaxed text-justify break-words">
                {{ $recipe->description }}
            </p>
        </div>
    </div>
@endsection
