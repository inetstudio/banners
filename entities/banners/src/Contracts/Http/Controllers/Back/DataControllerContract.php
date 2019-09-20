<?php

namespace InetStudio\BannersPackage\Banners\Contracts\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\BannersPackage\Banners\Contracts\Services\Back\DataTableServiceContract;

/**
 * Interface DataControllerContract.
 */
interface DataControllerContract
{
    /**
     * Получаем данные для отображения в таблице.
     *
     * @param  DataTableServiceContract  $dataTableService
     *
     * @return JsonResponse
     */
    public function data(DataTableServiceContract $dataTableService): JsonResponse;
}
