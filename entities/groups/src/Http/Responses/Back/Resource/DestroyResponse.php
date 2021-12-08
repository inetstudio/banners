<?php

namespace InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource;

use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

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
