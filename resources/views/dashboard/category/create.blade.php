<!-- Formulario para crear una categoria -->

<form action="{{ route("category.store") }}" method="POST">
    @include('layouts._form-category')
    <button type="submit">Crear Categoria</button>
</form>    
@include('layouts/_error-forms')
