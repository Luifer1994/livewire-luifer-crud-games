@if (session()->has('mensaje'))
<div class="alert alert-success text-center" role="alert">
    {{ session('mensaje') }}
</div>
@endif
<div class="p-2">
    <div class="text-center">
        <h1>REGISTRAR NUEVO JUEGO</h1>
    </div>
    @include("livewire.games.formulario")
    <div class="text-center">
        <button wire:click='store' type="submit" class="btn btn-primary">
            REGISTRAR
        </button>
    </div>
</div>

