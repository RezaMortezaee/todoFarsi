<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponse
{

    /**
     * Collection Result
     */
    public function showAll(ResourceCollection $collection, $code = 200)
    {
        return $this->collectionSuccessResponse($collection);
    }

    /**
     * Single Result
     */
    public function showOne(JsonResource $model)
    {
        return $this->successResponse($model);
    }

    /**
     * Error Response
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(
            [
                'code' => $code,
                'error' => $message,
                'link' => [
                    'self' => Route::currentRouteAction(),
                ],
            ]
        );
    }

    /**
     * Return eloquent instance
     */
    private function successResponse(JsonResource $model, $code = 200)
    {
        return response()->json(
            [
                'code' => $code,
                'data' => $model,
                'link' => [
                    'self' => Route::currentRouteName(),
                ],
            ]
        );
    }
    /**
     * Return collection instance
     */
    private function collectionSuccessResponse(ResourceCollection $collection, $code = 200)
    {
        return response()->json(
            [
                'code' => $code,
                'data' => $collection,
                'link' => [
                    'self' => Route::currentRouteName(),
                ],
            ]
        );
    }
}
