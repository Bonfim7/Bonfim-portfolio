<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Experience;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_techs' => Technology::count(),
            'total_experiences' => Experience::count(),
        ];

        // Dados para gráfico de tecnologias por categoria
        $techsByCategory = Technology::selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->get();

        return view('admin.dashboard', compact('stats', 'techsByCategory'));
    }
}
