<div class="table-responsive p-3">
    <div class="border p-2">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
    </div>
    <hr>
    @if ($games->count())
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->name }}</td>
                <td>{{ $game->description }}</td>
                <td>{{ $game->nameC }}</td>
                <td  style="width: 25px">
                    <div class="row">
                        <div class="col-6">
                            <button wire:click='edit({{ $game->id }})' type="button" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                        <div class="col-6">
                            <button wire:click='destroy({{ $game->id }})' type="button" class="btn btn-danger">
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
    
    {{ $games->links() }}
</div>