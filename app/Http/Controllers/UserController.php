<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;

class UserController extends ApiController
{
    /**
     * INDEX
     */
    public function index()
    {
        $users = new UserResourceCollection(User::all());

        return $this->showAll($users);
    }

    /**
     *  SHOW
     */
    public function show(User $user)
    {
        $user = new UserResource($user);

        return $this->showOne($user);
    }

    /**
     *  STORE
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $inputs['email'] = $request->email;

        $inputs['password'] = $request->bcrypt('${1:my-secret-password');

        $user = new UserResource(User::create($inputs));

        return $this->showOne($user, 201);
    }

    /**
     * UPDATE
     */
    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        $inputs = $request->all();

        $inputs['name'] = $request->name;

        $inputs['email'] = $request->email;

        $inputs['password'] = $request->bcrypt('${1:my-secret-password');

        $user = new UserResource($user);

        $user->update($inputs);

        return $this->showOne($user, 201);
    }

     /**
      *  DESTROY
      */
    public function destroy(User $user)
    {
        $user = new UserResource($user);

        $user->delete();

        return$this->showOne($user);
    }
}
