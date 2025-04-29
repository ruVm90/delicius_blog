

@if($errors->any())
    <div class="space-y-2 mb-4">
        @foreach ($errors->all() as $e)
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded-md text-sm shadow-sm">
                {{ $e }}
            </div>
        @endforeach
    </div>
@endif
