<?php

namespace InetStudio\BannersPackage\Places\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract
{
    /**
     * @var PlaceModelContract
     */
    protected $item;

    /**
     * SaveResponse constructor.
     *
     * @param  PlaceModelContract  $item
     */
    public function __construct(PlaceModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
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
