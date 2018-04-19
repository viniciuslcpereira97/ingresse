<?php

namespace Ingresse\Traits;

trait ResponsesTrait
{

    public function recordNotFound()
    {
        return response()->json([
            'message' => 'record not found',
        ], 404);
    }

    public function recordCreated()
    {
        return response()->json([
            'message' => 'record created',
        ], 201);
    }

    public function recordUpdated()
    {
        return response()->json([
            'message' => 'record updated',
        ], 201);
    }

    public function recordDeleted()
    {
        return response()->json([
            'message' => 'record deleted',
        ], 200);
    }

}
