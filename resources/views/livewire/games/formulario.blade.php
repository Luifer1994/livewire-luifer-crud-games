<div class="form-row">
    <div class="form-group col-md-12">
        <label>Nombre:</label>
        <input wire:model='name' type="text" class="form-control" placeholder="Nombre">
        @error('name')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-12">
        <label>Descripcion:</label>
        <input wire:model='description' type="text" class="form-control" placeholder="Descripcion">
        @error('description')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-12">
        <label>Categoria:</label>
        <select wire:model='id_categories' class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach
        </select>
        @error('id_categories')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
