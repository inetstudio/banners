<?php

namespace InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract
{
    /**
     * @var GroupModelContract
     */
    protected $item;

    /**
     * SaveResponse constructor.
     *
     * @param  GroupModelContract  $item
     */
    public function __construct(GroupModelContract $item)
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
            'back.banners-package.groups.edit',
            [
                $item['id'],
            ]
        );
    }
}
