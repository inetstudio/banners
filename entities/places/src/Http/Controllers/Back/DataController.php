<?php

namespace InetStudio\BannersPackage\Places\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\DataControllerContract;

class DataController extends Controller implements DataControllerContract
{
    public function data(DataTableServiceContract $dataTableService): JsonResponse
    {
        return $dataTableService->ajax();
    }
}
