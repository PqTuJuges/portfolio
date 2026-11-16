<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('admin/projects/Index', [
            'projects' => Project::orderBy('position')->get(['id', 'title', 'slug']),
        ]);
    }
}
