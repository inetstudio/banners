<?php

namespace InetStudio\BannersPackage\Banners\Services\Back;

use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Services\Back\UtilityServiceContract;

/**
 * Class UtilityService.
 */
class UtilityService extends BaseService implements UtilityServiceContract
{
    /**
     * UtilityService constructor.
     *
     * @param  BannerModelContract  $model
     */
    public function __construct(BannerModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Получаем подсказки.
     *
     * @param  string  $search
     *
     * @return Collection
     */
    public function getSuggestions(string $search): Collection
    {
        $items = $this->model::where(
            [
                ['title', 'LIKE', '%'.$search.'%'],
            ]
        )->get();

        return $items;
    }
}
