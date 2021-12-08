<?php

namespace InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back;

use InetStudio\BannersPackage\Places\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Requests\Back\SaveItemRequestContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\FormResponseContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\SaveResponseContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

interface ResourceControllerContract
{
    public function index(DataTableServiceContract $dataTableService): IndexResponseContract;

    public function create(ItemsServiceContract $resourceService): FormResponseContract;

    public function store(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request
    ): SaveResponseContract;

    public function edit(ItemsServiceContract $resourceService, int $id = 0): FormResponseContract;

    public function update(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract;

    public function destroy(ItemsServiceContract $resourceService, int $id = 0): DestroyResponseContract;
}
