<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\ApiController;

class UserTaskController extends ApiController
{
    public function index(Task $task)
    {
        //TODO:: This should return User-Task eloquent relationship
    }
}
