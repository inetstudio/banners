<?php

namespace InetStudio\BannersPackage\Places\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  PlaceModelContract  $model
     */
    public function __construct(PlaceModelContract $model)
    {
        parent::__construct($model);
    }
}
