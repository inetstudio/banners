<?php

namespace InetStudio\BannersPackage\Places\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var  array
     */
    public $bindings = [
        'InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract' => 'InetStudio\BannersPackage\Places\Models\PlaceModel',
        'InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\BannersPackage\Places\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\BannersPackage\Places\Transformers\Back\Utility\SuggestionTransformer',
        'InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\BannersPackage\Places\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\BannersPackage\Places\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\BannersPackage\Places\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\BannersPackage\Places\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\BannersPackage\Places\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\BannersPackage\Places\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\BannersPackage\Places\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\BannersPackage\Places\Http\Requests\Back\SaveItemRequest',
        'InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\BannersPackage\Places\Http\Controllers\Back\DataController',
        'InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\BannersPackage\Places\Http\Controllers\Back\ResourceController',
        'InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\BannersPackage\Places\Http\Controllers\Back\UtilityController',
        'InetStudio\BannersPackage\Places\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\BannersPackage\Places\Events\Back\ModifyItemEvent',
        'InetStudio\BannersPackage\Places\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\BannersPackage\Places\Services\Back\DataTableService',
        'InetStudio\BannersPackage\Places\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\BannersPackage\Places\Services\Back\ItemsService',
        'InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\BannersPackage\Places\Services\Back\UtilityService',
        'InetStudio\BannersPackage\Places\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\BannersPackage\Places\Services\Front\ItemsService',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return  array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
