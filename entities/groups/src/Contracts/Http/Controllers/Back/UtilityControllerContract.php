<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

interface UtilityControllerContract
{
    public function getSuggestions(
        UtilityServiceContract $utilityService,
        Request $request
    ): SuggestionsResponseContract;
}
