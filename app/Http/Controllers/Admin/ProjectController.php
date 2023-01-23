<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $projects = Project::where('name','like', "%$search%")->paginate(10);
        }else {

            $projects = Project::orderby('id','desc')->paginate(10);
        }
        $direction = 'desc';
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function groupby($column, $direction)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';

        $projects = Project::orderby($column ,$direction)->paginate(10);

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = $request->all();
        if(array_key_exists('cover_image', $project)) {
            $project['image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            $project['cover_image'] = Storage::put('uploads', $project['cover_image']);
        }

        $new_project = new Project();
        $project['slug'] = Project::generator_slug($project['name']);
        $new_project->fill($project);
        $new_project->save();

        return redirect()->route('admin.project.show', $new_project)->with('messages', 'POST AGGIUNTO CON SUCCESSO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_project = $request->all();

        if(array_key_exists('cover_image', $form_project)){
            if($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $form_project['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $form_project['cover_image'] = Storage::put('uploads', $form_project['cover_image']);
        }

        if($project->name != $form_project['name']) {
            $form_project['slug'] = Project::generator_slug($form_project['name']);
        } else {
            $form_project['slug'] = $project->slug;
        }

        $project->update($form_project);

        return redirect()->route('admin.project.show', $project)->with('messages', 'POST MODIFICATO CON SUCCESSO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('delete', 'Post eliminato corretamente');
    }
}
