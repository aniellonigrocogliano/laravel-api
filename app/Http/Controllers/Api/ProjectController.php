<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('technologies')->get();

        $data = [
            'success' => true,
            'results' => $projects
        ];

        return response()->json($data);
    }
}

