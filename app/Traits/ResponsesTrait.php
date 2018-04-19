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

}
