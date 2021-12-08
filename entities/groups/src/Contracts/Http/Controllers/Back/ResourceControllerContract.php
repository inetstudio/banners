<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back;

use InetStudio\BannersPackage\Groups\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Requests\Back\SaveItemRequestContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\FormResponseContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\SaveResponseContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

interface ResourceControllerContract
{
    public function index(DataTableServiceContract $dataTableService): IndexResponseContract;

    public function create(ItemsServiceContract $resourceService): FormResponseContract;

    public function store(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request
    ): SaveResponseContract;

    public function edit(
        ItemsServiceContract $resourceService,
        int $id = 0
    ): FormResponseContract;

    public function update(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract;

    public function destroy(
        ItemsServiceContract $resourceService,
        int $id = 0
    ): DestroyResponseContract;
}
