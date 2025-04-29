@extends('master')

@section('content')
    <!-- Encabezado -->
    <div class="max-w-4xl mx-auto text-center py-6">
        <h1 class="text-3xl font-extrabold text-gray-800">
            Recetas de <span class="text-green-600">{{ $user->name }}</span>
        </h1>
    </div>
     @if (session('status'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
        {{ session('status') }}
         </div>
         
     @endif
    <!-- Tabla de recetas -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">Receta</th>
                        <th class="px-6 py-3 text-center">Fecha de creación</th>
                        <th class="px-6 py-3 text-center">Categoría</th>
                        <th class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($my_recipes as $recipe)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                <a href="{{ route('recipe.show', $recipe->id) }}" class="hover:underline hover:text-green-600">
                                    {{ $recipe->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 text-center">
                                {{ $recipe->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-700 font-semibold rounded-full text-xs shadow-sm">
                                    {{ $recipe->category->category_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('recipe.edit', $recipe->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-300 text-white font-semibold py-1 px-4 rounded-full text-xs transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('recipe.destroy', $recipe->id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de borrar esta receta?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-400 text-white font-semibold py-1 px-4 rounded-full text-xs transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

