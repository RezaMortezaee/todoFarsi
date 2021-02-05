<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;

class TaskController extends ApiController
{
    /**
     * INDEX
     */
    public function index()
    {
        $tasks = new TaskResourceCollection(Task::all());

        return $this->showAll($tasks);
    }

    /**
     *  SHOW
     */
    public function show(Task $task)
    {
        $task = new TaskResource($task);

        return $this->showOne($task);
    }

    /**
     * STORE
     */
    public function store(TaskRequest $request, Task $task)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $task = new TaskResource(Task::create($inputs));

        return $this->showOne($task, 201);
    }

    /**
     * UPDATE
     */
    public function update(TaskRequest $request, Task $task)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $task = new TaskResource($task);

        $task->update($inputs);

        return $this->showOne($task);
    }

    /**
     *  DESTROY
     */
    public function destroy(Task $task)
    {
        $task = new TaskResource($task);

        $task->delete();

        return $this->showOne($task);
    }
}
