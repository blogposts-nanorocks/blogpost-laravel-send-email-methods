<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Project::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('status', 'Project created.');
    }
}
