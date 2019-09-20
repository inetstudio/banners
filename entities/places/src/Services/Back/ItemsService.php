<?php

namespace InetStudio\BannersPackage\Places\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Services\Back\ItemsServiceContract;

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

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return PlaceModelContract
     */
    public function save(array $data, int $id): PlaceModelContract
    {
        $action = ($id) ? 'отредактировано' : 'создано';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        event(
            app()->makeWith(
                'InetStudio\BannersPackage\Places\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Расположение «'.$item->name.'» успешно '.$action);

        return $item;
    }

    /**
     * Присваиваем группы объекту.
     *
     * @param $placesIds
     *
     * @param $item
     */
    public function attachToObject($placesIds, $item)
    {
        $placesIds = $placesIds ?? [];

        $item->places()->sync($placesIds);
    }
}
