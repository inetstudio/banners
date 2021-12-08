<?php

namespace InetStudio\BannersPackage\Places\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Front\ItemsServiceContract;

class ItemsService extends BaseService implements ItemsServiceContract
{
    public function __construct(PlaceModelContract $model)
    {
        parent::__construct($model);
    }
}
