@csrf

<div class="flex flex-col">
    <label for="category_name" class="text-gray-700 font-medium mb-1">Nombre de la categoría:</label>
    <input
        type="text"
        name="category_name"
        id="category_name"
        required
        value="{{ old('category_name', $category->category_name ?? '') }}"
        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
    >
<!-- Imagen -->
<div>
    <label for="image" class="block text-gray-700 font-semibold mb-2">Imagen de la categoria:</label>
    @if (isset($category->image))
        <img src="{{ asset('storage/' . $category->image) }}" alt="Imagen de la categoria"
            class="w-80 h-auto mb-4 p-2 rounded">
    @endif
    <input type="file" name="image"
        class="block w-full text-sm text-gray-600
                  file:mr-4 file:py-2 file:px-4
                  file:rounded file:border-0
                  file:text-sm file:font-semibold
                  file:bg-blue-50 file:text-blue-700
                  hover:file:bg-blue-100" />
</div>
    {{-- Error específico del campo --}}
    @error('category_name')
        <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
    @enderror
</div>
