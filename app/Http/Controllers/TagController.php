<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Http\Resources\TagResourceCollection;

class TagController extends ApiController
{
    /**
     * INDEX
     */
    public function index()
    {
        $tags = new TagResourceCollection(Tag::all());

        return $this->showAll($tags);
    }

    /**
     *  SHOW
     */
    public function show(Tag $tag)
    {
        $tag = new TagResource($tag);

        return $this->showOne($tag);
    }

    /**
     * STORE
     */
    public function store(TagRequest $request)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $tag = new TagResource(Tag::create($inputs));

        return $this->showOne($tag, 201);
    }

    /**
     * UPDATE
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $tag = new TagResource($tag);

        $tag->update($inputs);

        return $this->showOne($tag, 201);
    }

    /**
     *  DESTROY
     */
    public function destroy(Tag $tag)
    {
        $tag = new TagResource($tag);

        $tag->delete();

        return $this->showOne($tag);
    }
}
