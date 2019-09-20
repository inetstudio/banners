<?php

namespace InetStudio\BannersPackage\Banners\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var array
     */
    public $bindings = [
        'InetStudio\BannersPackage\Banners\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\BannersPackage\Banners\Events\Back\ModifyItemEvent',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\BannersPackage\Banners\Http\Controllers\Back\ResourceController',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\BannersPackage\Banners\Http\Controllers\Back\DataController',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\BannersPackage\Banners\Http\Controllers\Back\UtilityController',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\BannersPackage\Banners\Http\Requests\Back\SaveItemRequest',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\BannersPackage\Banners\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\BannersPackage\Banners\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\BannersPackage\Banners\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract' => 'InetStudio\BannersPackage\Banners\Models\BannerModel',
        'InetStudio\BannersPackage\Banners\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\BannersPackage\Banners\Services\Back\DataTableService',
        'InetStudio\BannersPackage\Banners\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\BannersPackage\Banners\Services\Back\ItemsService',
        'InetStudio\BannersPackage\Banners\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\BannersPackage\Banners\Services\Back\UtilityService',
        'InetStudio\BannersPackage\Banners\Contracts\Services\Front\FeedsServiceContract' => 'InetStudio\BannersPackage\Banners\Services\Front\FeedsService',
        'InetStudio\BannersPackage\Banners\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\BannersPackage\Banners\Services\Front\ItemsService',
        'InetStudio\BannersPackage\Banners\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\BannersPackage\Banners\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\BannersPackage\Banners\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\BannersPackage\Banners\Transformers\Back\Utility\SuggestionTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
