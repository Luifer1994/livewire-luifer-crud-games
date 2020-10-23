<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use Livewire\Component;
use App\Models\Games;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class GamesComponent extends Component
{
    use WithPagination;
    // CAMPOS DE LA TABLA GAMES
    public $id_game, $name, $description, $id_categories, $id_users;
    // VARIABLE QUE USAREMOS PARA LLAMAR EL FORMULARIO
    public $formulario = "register";

    public $searh = '';

    public function render()
    {
        return view('livewire.games-component',[
            'games' => Games::select('games.*', 'categories.name as nameC')
            ->where('games.name', 'LIKE', "%{$this->searh}%")
            ->join('categories', 'games.id_categories', '=', 'categories.id')
            ->orderBy('id')
            ->paginate(5),
            'categories' => Categories::all(),
        ]);
    }

    public function store()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'name'          => 'required',
            'description'   => 'required',
            'id_categories' => 'required',
        ]);

        //CREAMOS UN NUEVO REGISTRO CON LOS CAMPOS VALIDADOS
        $game = Games::create([
            'name'          => $this->name,
            'description'   => $this->description,
            'id_categories' => $this->id_categories,
            //USAMOS EL HELPER AUTH PARA OPTENER EL ID DEL USUARIO QUE ESTA CREANDO EL JUEGO
            'id_users'      => Auth::user()->id,
        ]);
        $this->edit($game->id);

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'JUEGO REGISTRADO CON EXITO');

        $this->emit('store');
    }

    public function edit($id)
    {
        $game = Games::find($id);
        $this->id_game       = $game->id;
        $this->name          = $game->name;
        $this->description   = $game->description;
        $this->id_categories = $game->id_categories;

        $this->formulario = "edit";
    }


    public function update()
    {
        $this->validate([
            'name'          => 'required',
            'description'   => 'required',
            'id_categories' => 'required',
        ]);

        $game = Games::find($this->id_game);
        $game->update([
            'name'          => $this->name,
            'description'   => $this->description,
            'id_categories' => $this->id_categories,
        ]);

        $this->default();

        session()->flash('mensaje', 'JUEGO ACTUALIZADO CON EXITO');

        $this->emit('store');
    }

    public function destroy($id)
    {
        Games::destroy($id);
        session()->flash('mensaje', 'JUEGO ELIMINADO CON EXITO');
    }

    public function default()
    {
        $this->name          = "";
        $this->description   = "";
        $this->id_categories = "";

        $this->formulario = "register";
    }

}

