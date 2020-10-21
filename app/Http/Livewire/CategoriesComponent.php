<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use WithPagination;
    // CAMPOS DE LA TABLA GAMES
    public $id_categorie, $name;
    // VARIABLE QUE USAREMOS PARA LLAMAR EL FORMULARIO
    public $formulario = "register";

    public $searh = '';


    public function render()
    {
        return view('livewire.categories-component',[
            'categories' => Categories::where('name', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')
            ->paginate(5),
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
        $category = Categories::create([
            'name'          => $this->name,
        ]);
        $this->edit($category->id);

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'CATEGORIA REGISTRADA CON EXITO');
    }

    public function edit($id)
    {
        $category =  Categories::find($id);
        $this->id_categorie = $category->id;
        $this->name         = $category->name;

        $this->formulario = "edit";
    }


    public function update()
    {
        $this->validate([
            'name'          => 'required',
        ]);

        $category = Categories::find($this->id_categorie);
        $category->update([
            'name'          => $this->name,
        ]);

        $this->default();

        session()->flash('mensaje', 'CATEGORIA ACTUALIZADA CON EXITO');
    }

    public function destroy($id)
    {
        Categories::destroy($id);
        session()->flash('mensaje', 'CATEGORIA ELIMINADA CON EXITO');
    }

    public function default()
    {
        $this->name          = "";

        $this->formulario = "register";
    }
}
