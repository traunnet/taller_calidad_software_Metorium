<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'slug' => 'required|unique:Categorias,slug'
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'slug' => 'required|unique:Categorias,slug,' . $categoria->id_categoria . ',id_categoria'
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada');
    }
}
