<?php

namespace InetStudio\BannersPackage\Places\Http\Responses\Back\Resource;

use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\IndexResponseContract;

class IndexResponse implements IndexResponseContract
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toResponse($request)
    {
        return view('admin.module.banners-package.places::back.pages.index', $this->data);
    }
}
