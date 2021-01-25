<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        if (!session()->has("search")) {
            session()->put("search", null);
            session()->put("trashed", null);
        }
        return Inertia::render("Projects/Index", [
            "filters"   =>  session()->only(["search", "trashed"]),
            "projects"  =>  Project::with("user")
                ->latest()
                ->filter(request()->only("search", "trashed"))
                ->paginate(5)
        ]);
    }

    public function create()
    {
        return Inertia::render("Projects/Create");
    }

    public function store()
    {
        $validate = request()->validate([
            "name" => "required|unique:projects",
            "excerpt" => "required|min:10|max:200",
            "content" => "required|min:10|max:1000"
        ]);

        Project::create([
            "name"  =>  $validate['name'],
            "excerpt"   =>  $validate['excerpt'],
            "content"   =>  $validate['content'],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'project' => [
                'id'            =>  $project->id,
                'name'          =>  $project->name,
                'excerpt'       =>  $project->excerpt,
                'content'       =>  $project->content,
                'deleted_at'    =>  Carbon::parse($project->deleted_at)->diffForHumans()
            ]
        ]);
    }

    public function update(Project $project)
    {
        $validate = request()->validate([
            "name" => "required|unique:projects,name," . $project->id,
            "excerpt" => "required|min:10|max:200",
            "content" => "required|min:10|max:1000"
        ]);

        $project->update([
            "name"  =>  $validate['name'],
            "excerpt"   =>  $validate['excerpt'],
            "content"   =>  $validate['content'],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
