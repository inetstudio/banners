<?php

namespace InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

/**
 * Interface UtilityControllerContract.
 */
interface UtilityControllerContract
{
    /**
     * Возвращаем группы для поля.
     *
     * @param  UtilityServiceContract  $utilityService
     * @param  Request  $request
     *
     * @return SuggestionsResponseContract
     */
    public function getSuggestions(
        UtilityServiceContract $utilityService,
        Request $request
    ): SuggestionsResponseContract;
}
