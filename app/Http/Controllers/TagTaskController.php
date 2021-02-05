<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\ApiController;

class TagTaskController extends ApiController
{
    public function index(Tag $tag)
    {
        //TODO:: This should return Tag-Task eloquent relationship
    }
}
