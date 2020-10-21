@if (session()->has('mensaje'))
<div class="alert alert-success text-center" role="alert">
    {{ session('mensaje') }}
</div>
@endif
<div class="p-2">
    <div class="text-center">
        <h1>ACTUALIZAR JUEGO</h1>
    </div>
    @include("livewire.games.formulario")
    <div class="text-center">
        <button wire:click='update'  class="btn btn-primary">
            ACTUALIZAR
        </button>
        <button wire:click='default' class="btn btn-danger">
            CANCELAR
        </button>
    </div>
</div>


