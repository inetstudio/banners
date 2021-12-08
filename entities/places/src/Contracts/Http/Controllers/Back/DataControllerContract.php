<?php

namespace InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\DataTableServiceContract;

interface DataControllerContract
{
    public function data(DataTableServiceContract $dataTableService): JsonResponse;
}
