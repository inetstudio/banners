<?php

namespace InetStudio\BannersPackage\Places\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

class DestroyResponse implements DestroyResponseContract
{
    protected bool $result;

    public function __construct(bool $result)
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        return response()->json(
            [
                'success' => $this->result,
            ]
        );
    }
}
