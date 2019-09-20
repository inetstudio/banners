<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Resource;

use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  GroupModelContract  $item
     *
     * @return array
     */
    public function transform(GroupModelContract $item): array;
}
