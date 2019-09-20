<?php

namespace InetStudio\BannersPackage\Places\Services\Back;

use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract;

/**
 * Class UtilityService.
 */
class UtilityService extends BaseService implements UtilityServiceContract
{
    /**
     * UtilityService constructor.
     *
     * @param  PlaceModelContract  $model
     */
    public function __construct(PlaceModelContract $model)
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
                ['name', 'LIKE', '%'.$search.'%'],
            ]
        )->get();

        return $items;
    }
}
