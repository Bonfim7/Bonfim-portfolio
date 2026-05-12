<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|numeric|min:0|max:100',
        ]);

        Technology::create($request->all());

        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia adicionada!');
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|numeric|min:0|max:100',
        ]);

        $technology->update($request->all());

        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia atualizada!');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia excluída!');
    }
}
