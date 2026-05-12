<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'start_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['is_current'] = $request->has('is_current');

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experiência adicionada!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'start_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['is_current'] = $request->has('is_current');

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experiência atualizada!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experiência excluída!');
    }
}
