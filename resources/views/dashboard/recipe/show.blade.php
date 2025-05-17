@extends('master')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 font-sans">
        {{-- Imagen de la receta --}}
        <div class="mb-6">
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Imagen de la receta: {{ $recipe->title }}"
                    class="w-full max-h-96 object-cover rounded-2xl shadow-md">
            @else
                <div class="w-full h-64 flex items-center justify-center border border-dashed border-gray-300 rounded-2xl text-gray-800 text-2xl font-bold backdrop-blur-sm bg-cover bg-center"
                    style="background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), url('/assets/welcome/Portada_blog.png');">
                    Sin imagen disponible
                </div>
            @endif
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
                @foreach ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->name . ': ' . $ingredient->quantity }}</li>
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
