<?php

namespace InetStudio\BannersPackage\Groups\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  GroupModelContract  $model
     */
    public function __construct(GroupModelContract $model)
    {
        parent::__construct($model);
    }
}
