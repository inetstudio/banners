<?php

namespace InetStudio\BannersPackage\Groups\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        'InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract' => 'InetStudio\BannersPackage\Groups\Models\GroupModel',
        'InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\BannersPackage\Groups\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\BannersPackage\Groups\Transformers\Back\Utility\SuggestionTransformer',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\BannersPackage\Groups\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\BannersPackage\Groups\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\BannersPackage\Groups\Http\Requests\Back\SaveItemRequest',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\BannersPackage\Groups\Http\Controllers\Back\DataController',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\BannersPackage\Groups\Http\Controllers\Back\ResourceController',
        'InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\BannersPackage\Groups\Http\Controllers\Back\UtilityController',
        'InetStudio\BannersPackage\Groups\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\BannersPackage\Groups\Events\Back\ModifyItemEvent',
        'InetStudio\BannersPackage\Groups\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\BannersPackage\Groups\Services\Back\DataTableService',
        'InetStudio\BannersPackage\Groups\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\BannersPackage\Groups\Services\Back\ItemsService',
        'InetStudio\BannersPackage\Groups\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\BannersPackage\Groups\Services\Back\UtilityService',
        'InetStudio\BannersPackage\Groups\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\BannersPackage\Groups\Services\Front\ItemsService',
    ];

    public function provides()
    {
        return array_keys($this->bindings);
    }
}
