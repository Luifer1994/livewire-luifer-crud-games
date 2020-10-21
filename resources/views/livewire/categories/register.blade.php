@if (session()->has('mensaje'))
<div class="alert alert-success text-center" role="alert">
    {{ session('mensaje') }}
</div>
@endif
<div class="p-2">
    <div class="text-center">
        <h1>REGISTRAR NUEVA CATEGORIA</h1>
    </div>
    <br>
    <div class="form-row">
        <div class="form-group col-md-8">
            @include("livewire.categories.formulario")
        </div>
        <div class="form-group col-md-4">
            <button wire:click='store' type="submit" class="btn btn-primary btn-block">
                REGISTRAR
            </button>
        </div>
    </div>
</div>