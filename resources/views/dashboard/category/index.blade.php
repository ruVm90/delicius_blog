@extends('master')

@section('content')
    <section class="container mx-auto py-12">

        {{-- Botón para crear categoría (solo admin) --}}
        @auth
            @if (Auth::user()->rol === 'admin')
                <div class="mb-8 flex justify-center">
                    <a href="{{ route('category.create') }}"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition shadow">
                        + Crear nueva categoría
                    </a>
                </div>
            @endif
        @endauth

        {{-- Título --}}
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Categorías Populares</h2>
        @if (session('status-category'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('status-category') }}
            </div>
        @endif
        {{-- Grid de categorías --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <div
                    class="bg-white p-6 shadow-lg rounded-lg text-center flex flex-col items-center h-72 hover:shadow-lg transition transform hover:-translate-y-1">

                    {{-- Nombre --}}
                    <h3 class="mb-3 text-xl font-semibold uppercase text-gray-800">
                        {{ $category->category_name }}
                    </h3>

                    {{-- Imagen --}}
                    <a href="{{ route('category.show', $category) }}" class="w-full">
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}"
                                class="w-full h-40 object-cover rounded-lg" alt="{{ $category->category_name }}">
                        @else
                            <div
                                class="w-full h-40 flex items-center justify-center bg-gray-100 rounded-lg text-gray-400 italic">
                                Sin imagen
                            </div>
                        @endif
                    </a>

                    {{-- Botones admin --}}
                    @auth
                        @if (Auth::user()->rol === 'admin')
                            <div class="mt-3 flex gap-4">
                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="text-sm text-blue-600 pt-1 hover:text-blue-800 font-medium underline">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm text-red-600 pt-1 hover:text-red-800 font-medium underline">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </section>
@endsection
