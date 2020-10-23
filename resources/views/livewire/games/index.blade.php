{{-- MODAL REGISTER --}}
@include('livewire.games.register')

<div class="table-responsive p-3">
    @if (session()->has('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="text-right">
        <!-- Button trigger modal register-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGame">
            Nuevo Juego
        </button>
    </div>
<div class="table-responsive p-3">
    <div class="p-2">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
    </div>
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
                            <button wire:click='edit({{ $game->id }})' data-toggle="modal" data-target="#editGame" type="button" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            @include('livewire.games.edit')
                        </div>
                        <div class="col-6">
                            <button onclick="alert('Estas seguro que deseas eliminar el juego {{ $game->name }}')" wire:click='destroy({{ $game->id }})' type="button" class="btn btn-danger">
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