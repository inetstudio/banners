<?php

namespace InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource;

use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\FormResponseContract;

class FormResponse implements FormResponseContract
{
    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function toResponse($request)
    {
        return view('admin.module.banners-package.groups::back.pages.form', $this->data);
    }
}
