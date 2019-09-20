<?php

namespace InetStudio\BannersPackage\Places\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param  PlaceModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(PlaceModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'name' => $item['name'],
            'alias' => $item['alias'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                'admin.module.banners-package.places::back.partials.datatables.actions',
                compact('item')
            )->render(),
        ];
    }
}
