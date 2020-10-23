{{-- MODAL REGISTER --}}
@include('livewire.categories.register')

<div class="table-responsive p-3">
    @if (session()->has('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="text-right">
        <!-- Button trigger modal register-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            Nueva Categoria
        </button>
    </div>
    <div class="p-2">
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
                            <button wire:click='edit({{ $category->id }})' data-toggle="modal" data-target="#editCategory" type="button" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                          {{-- MODAL EDITAR   --}}
                        @include('livewire.categories.edit')        
                        </div>
                        <div class="col-6">
                            <button onclick="alert('Estas seguro que deseas eliminar la categoria {{ $category->name }}')" wire:click='destroy({{ $category->id }})'type="button" class="btn btn-danger">
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

