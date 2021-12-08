<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\DataTableServiceContract;

interface DataControllerContract
{
    public function data(DataTableServiceContract $dataTableService): JsonResponse;
}
