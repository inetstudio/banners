<?php

namespace InetStudio\BannersPackage\Groups\Services\Back;

use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\UtilityServiceContract;

class UtilityService extends BaseService implements UtilityServiceContract
{
    public function __construct(GroupModelContract $model)
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
