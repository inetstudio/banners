<?php

namespace InetStudio\BannersPackage\Places\Http\Responses\Back\Resource;

use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

class SaveResponse implements SaveResponseContract
{
    protected PlaceModelContract $item;

    public function __construct(PlaceModelContract $item)
    {
        $this->item = $item;
    }

    public function toResponse($request)
    {
        $item = $this->item->fresh();

        return response()->redirectToRoute(
            'back.banners-package.places.edit',
            [
                $item['id'],
            ]
        );
    }
}
