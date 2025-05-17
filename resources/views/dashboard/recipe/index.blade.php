@extends('master')
@section('content')
    <div class="m-5 p-4">
        <h1 class="text-center text-2xl font-bold">Ultimas recetas añadidas:</h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 m-3 p-5">
        @foreach ($recipes as $recipe)
            <x-card-recipe :recipe="$recipe" />
        @endforeach
    </div>
    <!-- PAGINACIÓN -->
    <ul class="flex justify-center gap-1 text-gray-900 mt-6">
        <!-- Página anterior -->
        @if ($recipes->onFirstPage())
            <li class="opacity-50 cursor-not-allowed">
                <span class="grid size-8 place-content-center rounded border border-gray-200">
                    &lt;
                </span>
            </li>
        @else
            <li>
                <a href="{{ $recipes->previousPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-gray-200 hover:bg-gray-50"
                    aria-label="Página anterior">
                    &lt;
                </a>
            </li>
        @endif

        <!-- Números de página -->
        @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
            @if ($page == $recipes->currentPage())
                <li
                    class="block size-8 rounded border border-yellow-500 bg-yellow-500 text-center p-1 text-sm font-medium text-white">
                    {{ $page }}
                </li>
            @else
                <li>
                    <a href="{{ $url }}"
                        class="block size-8 rounded border border-gray-200 text-center text-sm font-medium hover:bg-yellow-400 p-1">
                        {{ $page }}
                    </a>
                </li>
            @endif
        @endforeach

        <!-- Página siguiente -->
        @if ($recipes->hasMorePages())
            <li>
                <a href="{{ $recipes->nextPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-gray-200 hover:bg-gray-50"
                    aria-label="Página siguiente">
                    &gt;
                </a>
            </li>
        @else
            <li class="opacity-50 cursor-not-allowed">
                <span class="grid size-8 place-content-center rounded border border-gray-200">
                    &gt;
                </span>
            </li>
        @endif
    </ul>
@endsection
