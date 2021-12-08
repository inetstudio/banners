<?php

namespace InetStudio\BannersPackage\Places\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\FormResponseContract;

class FormResponse implements FormResponseContract
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toResponse($request)
    {
        return view('admin.module.banners-package.places::back.pages.form', $this->data);
    }
}
