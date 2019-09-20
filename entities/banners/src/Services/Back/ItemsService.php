<?php

namespace InetStudio\BannersPackage\Banners\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Services\Back\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  BannerModelContract  $model
     */
    public function __construct(BannerModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return BannerModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): BannerModelContract
    {
        $action = ($id) ? 'отредактирован' : 'создан';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        $placesData = collect(Arr::get($data, 'places', []));
        app()->make('InetStudio\BannersPackage\Places\Contracts\Services\Back\ItemsServiceContract')
            ->attachToObject($placesData, $item);

        $groupsData = collect(Arr::get($data, 'groups', []));
        app()->make('InetStudio\BannersPackage\Groups\Contracts\Services\Back\ItemsServiceContract')
            ->attachToObject($groupsData, $item);

        $images = ['banner'];
        app()->make('InetStudio\Uploads\Contracts\Services\Back\ImagesServiceContract')
            ->attachToObject(request(), $item, $images, 'banners', '');

        event(
            app()->makeWith(
                'InetStudio\BannersPackage\Banners\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Баннер «'.$item->title.'» успешно '.$action);

        return $item;
    }
}
