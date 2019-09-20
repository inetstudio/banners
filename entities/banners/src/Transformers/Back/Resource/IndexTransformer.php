<?php

namespace InetStudio\BannersPackage\Banners\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  BannerModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(BannerModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'is_active' => view(
                'admin.module.banners-package.banners::back.partials.datatables.active',
                compact('item')
            )->render(),
            'places' => view(
                'admin.module.banners-package.banners::back.partials.datatables.places',
                [
                    'places' => $item['places'],
                ]
            )->render(),
            'groups' => view(
                'admin.module.banners-package.banners::back.partials.datatables.groups',
                [
                    'groups' => $item['groups'],
                ]
            )->render(),
            'title' => $item['title'],
            'date_start' => (string) $item['date_start'],
            'date_end' => (string) $item['date_end'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                'admin.module.banners-package.banners::back.partials.datatables.actions',
                [
                    'id' => $item['id'],
                ]
            )->render(),
        ];
    }
}
