<?php

namespace InetStudio\BannersPackage\Banners\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Services\Front\FeedsServiceContract;

/**
 * Class FeedsService.
 */
class FeedsService extends BaseService implements FeedsServiceContract
{
    /**
     * FeedsService constructor.
     *
     * @param  BannerModelContract  $model
     */
    public function __construct(BannerModelContract $model)
    {
        parent::__construct($model);
    }
}
