<?php

namespace InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

interface UtilityControllerContract
{
    public function getSuggestions(
        UtilityServiceContract $utilityService,
        Request $request
    ): SuggestionsResponseContract;
}
