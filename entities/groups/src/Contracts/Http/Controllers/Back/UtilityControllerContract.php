<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

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
