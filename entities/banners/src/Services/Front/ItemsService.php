<?php

namespace InetStudio\BannersPackage\Banners\Services\Front;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var array
     */
    protected $materialsItems = [];

    /**
     * ItemsService constructor.
     *
     * @param  BannerModelContract  $model
     */
    public function __construct(BannerModelContract $model)
    {
        parent::__construct($model);

        $this->initItems(
            [
                'relations' => ['places', 'groups', 'media'],
            ]
        );
    }

    /**
     * Получаем объекты по типу.
     *
     * @param  array  $params
     */
    protected function initItems(array $params = []): void
    {
        $now = Carbon::now();

        $items = $this->model->buildQuery($params)
            ->where(function ($query) use ($now) {
                $query->where('date_start', '<=', $now)->orWhereNull('date_start');
            })
            ->where(function ($query) use ($now) {
                $query->where('date_end', '>=', $now)->orWhereNull('date_end');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($items as $item) {
            foreach ($item->places as $place) {
                $groups = $item->groups->toArray();

                foreach ($groups ?: [['alias' => 'default']] as $group) {
                    $this->items[$place->alias][$group['alias']][] = $item;
                }
            }
        }
    }

    /**
     * Получаем случайные баннеры.
     *
     * @param  array  $positions
     * @param  array  $item
     *
     * @return array
     */
    public function getRandomItems(array $positions, array $item = []): array
    {
        $items = [];

        foreach ($positions as $position => $count) {
            $items[$position] = (isset($item['type']) && isset($item['slug']) && isset($this->materialsItems[$position][$item['type'].'_'.$item['slug']]))
                ? Arr::only($this->materialsItems[$position], $item['type'].'_'.$item['slug'])
                : Arr::random($this->items[$position] ?? [], min(count($this->items[$position] ?? []), $count));

            $items[$position] = Arr::flatten($items[$position], 1);
            $items[$position] = Arr::random($items[$position], min(count($items[$position] ?? []), $count));
        }

        return $items;
    }
}
