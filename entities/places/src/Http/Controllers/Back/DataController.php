<?php

namespace InetStudio\BannersPackage\Places\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\DataControllerContract;

/**
 * Class DataController.
 */
class DataController extends Controller implements DataControllerContract
{
    /**
     * Получаем данные для отображения в таблице.
     *
     * @param  DataTableServiceContract  $dataTableService
     *
     * @return JsonResponse
     */
    public function data(DataTableServiceContract $dataTableService): JsonResponse
    {
        return $dataTableService->ajax();
    }
}
