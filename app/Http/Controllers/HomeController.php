<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $projects = Project::with('technologies')->orderBy('order')->get();
        $technologies = Technology::all()->groupBy('category');

        return view('welcome', compact('experiences', 'projects', 'technologies'));
    }
}
