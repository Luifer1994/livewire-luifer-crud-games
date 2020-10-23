<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">ACTUALIZAR CATEGORIA</h5>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        @include("livewire.categories.formulario")
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click='default' type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                <button wire:click='update' type="button" class="btn btn-primary">ACTUALIZAR</button>
            </div>
        </div>
    </div>
</div>
