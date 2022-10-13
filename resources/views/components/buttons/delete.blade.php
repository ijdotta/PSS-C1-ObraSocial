<form action="@if(isset($route) && isset($element)){{route($route, $element)}} @endif" class="formulario-eliminar d-inline align-middle" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger col" aria-expanded="false" title="Eliminar">
        <i class="fa fa-trash mx-1"></i>
    </button>
</form>