<?php

namespace InetStudio\BannersPackage\Groups\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back\DataControllerContract;

class DataController extends Controller implements DataControllerContract
{
    public function data(DataTableServiceContract $dataTableService): JsonResponse
    {
        return $dataTableService->ajax();
    }
}
