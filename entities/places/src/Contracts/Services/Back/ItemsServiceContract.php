<?php

namespace InetStudio\BannersPackage\Places\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;

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
     * @return PlaceModelContract
     */
    public function save(array $data, int $id): PlaceModelContract;

    /**
     * Присваиваем группы объекту.
     *
     * @param $placesIds
     *
     * @param $item
     */
    public function attachToObject($placesIds, $item);
}
