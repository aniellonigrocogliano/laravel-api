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

        $projects = Project::with('technologies')->paginate(8);

        $data = [
            'success' => true,
            'results' => $projects
        ];

        return response()->json($data);
    }
    public function single(string $slug)
{
    $project = Project::with('technologies')->where('slug', $slug)->first();

    if ($project) {
        $data = [
            'success' => true,
            'results' => $project
        ];
    } else {
        $data = [
            'success' => false,
            'message' => 'Project not found'
        ];
    }

    return response()->json($data);
}

}

