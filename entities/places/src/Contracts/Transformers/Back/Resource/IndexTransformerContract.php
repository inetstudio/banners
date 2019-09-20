<?php

namespace InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Resource;

use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  PlaceModelContract  $item
     *
     * @return array
     */
    public function transform(PlaceModelContract $item): array;
}
