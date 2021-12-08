<?php

namespace InetStudio\BannersPackage\Places\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\UtilityControllerContract;
use InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

class UtilityController extends Controller implements UtilityControllerContract
{
    public function getSuggestions(UtilityServiceContract $utilityService, Request $request): SuggestionsResponseContract
    {
        $search = $request->get('q', '') ?? '';
        $type = $request->get('type', '') ?? '';

        $items = $utilityService->getSuggestions($search);

        return resolve(SuggestionsResponseContract::class, compact('items', 'type'));
    }
}
