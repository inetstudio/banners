<?php

namespace InetStudio\BannersPackage\Banners\Contracts\Transformers\Back\Resource;

use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  BannerModelContract  $item
     *
     * @return array
     */
    public function transform(BannerModelContract $item): array;
}
