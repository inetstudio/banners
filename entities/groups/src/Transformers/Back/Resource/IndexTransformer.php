<?php

namespace InetStudio\BannersPackage\Groups\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param  GroupModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(GroupModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'name' => $item['name'],
            'alias' => $item['alias'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                'admin.module.banners-package.groups::back.partials.datatables.actions',
                compact('item')
            )->render(),
        ];
    }
}
