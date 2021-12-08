<?php

namespace InetStudio\BannersPackage\Places\Services\Back;

use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\UtilityServiceContract;

class UtilityService extends BaseService implements UtilityServiceContract
{
    public function __construct(PlaceModelContract $model)
    {
        parent::__construct($model);
    }

    public function getSuggestions(string $search): Collection
    {
        return $this->model::where(
            [
                ['name', 'LIKE', '%'.$search.'%'],
            ]
        )->get();
    }
}
