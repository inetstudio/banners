<?php

namespace InetStudio\BannersPackage\Banners\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return BannerModelContract
     */
    public function save(array $data, int $id): BannerModelContract;
}
