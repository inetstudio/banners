<?php

namespace InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\IndexResponseContract;

/**
 * Class IndexResponse.
 */
class IndexResponse implements IndexResponseContract
{
    /**
     * @var array
     */
    protected $data;

    /**
     * IndexResponse constructor.
     *
     * @param  array  $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Возвращаем ответ при открытии списка объектов.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('admin.module.banners-package.banners::back.pages.index', $this->data);
    }
}
