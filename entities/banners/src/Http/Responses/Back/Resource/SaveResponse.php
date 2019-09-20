<?php

namespace InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract
{
    /**
     * @var BannerModelContract
     */
    protected $item;

    /**
     * SaveResponse constructor.
     *
     * @param  BannerModelContract  $item
     */
    public function __construct(BannerModelContract $item)
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
            'back.banners-package.banners.edit',
            [
                $item['id'],
            ]
        );
    }
}
