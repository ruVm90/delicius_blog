@extends('master')
@section('content')

<div>
    {{ $recipe->title }}
</div>
<div>
    {{ $recipe->image }}
</div>
<div>
    {{ $recipe->description }}
</div>
<div>
    {{ $recipe->difficulty }}
</div>

@endsection
