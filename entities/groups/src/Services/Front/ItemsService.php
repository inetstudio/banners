<?php

namespace InetStudio\BannersPackage\Groups\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Front\ItemsServiceContract;

class ItemsService extends BaseService implements ItemsServiceContract
{
    public function __construct(GroupModelContract $model)
    {
        parent::__construct($model);
    }
}
