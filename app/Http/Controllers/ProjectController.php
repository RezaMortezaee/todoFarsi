<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectResourceCollection;
class ProjectController extends ApiController
{
    /**
     * INDEX
     */
    public function index()
    {
        $project = new ProjectResourceCollection(Project::all());

        return $this->showAll($project);
    }

    /**
     *  SHOW
     */
    public function show(Project $project)
    {
        $project = new ProjectResource($project);

        return $this->showOne($project);
    }

    public function store(ProjectRequest $request, Project $project)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $project = new ProjectResource(Project::create($inputs));

        return $this->showOne($project, 201);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $request->validated();



        $inputs['name'] = $request->name;

        $project = new ProjectResource($project);

        $project->update($inputs);

        return $this->showOne($project);
    }

    public function destroy(Project $project)
    {
        $project = new ProjectResource($project);

        $project->delete();

        return $this->showOne($project);
    }
}
