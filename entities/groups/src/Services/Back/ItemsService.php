<?php

namespace InetStudio\BannersPackage\Groups\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\ItemsServiceContract;

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

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return GroupModelContract
     */
    public function save(array $data, int $id): GroupModelContract
    {
        $action = ($id) ? 'отредактирована' : 'создана';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        event(
            app()->makeWith(
                'InetStudio\BannersPackage\Groups\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Группа «'.$item->name.'» успешно '.$action);

        return $item;
    }

    /**
     * Присваиваем группы объекту.
     *
     * @param $groupsIds
     *
     * @param $item
     */
    public function attachToObject($groupsIds, $item)
    {
        $groupsIds = $groupsIds ?? [];

        $item->groups()->sync($groupsIds);
    }
}
