<?php

namespace InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource;

use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

class SaveResponse implements SaveResponseContract
{
    protected GroupModelContract $item;

    public function __construct(GroupModelContract $item)
    {
        $this->item = $item;
    }

    public function toResponse($request)
    {
        $item = $this->item->fresh();

        return response()->redirectToRoute(
            'back.banners-package.groups.edit',
            [
                $item['id'],
            ]
        );
    }
}
