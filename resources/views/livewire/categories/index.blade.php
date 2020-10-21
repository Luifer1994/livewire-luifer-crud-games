<div class="table-responsive p-3">
    <div class="border p-2">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
    </div>
    <hr>
    @if ($categories->count())
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td  style="width: 25px">
                    <div class="row">
                        <div class="col-6">
                            <button wire:click='edit({{ $category->id }})' type="button" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                        <div class="col-6">
                            <button wire:click='destroy({{ $category->id }})' type="button" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center">
        <p class="text-black-50">NO HAY RESULTADOS PARA LA BUSQUEDA {{ $searh }}</p>
  </div>
    @endif
    
    {{ $categories->links() }}
</div>