<?php

namespace InetStudio\BannersPackage\Banners\Contracts\Transformers\Back\Utility;

use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;

/**
 * Interface SuggestionTransformerContract.
 */
interface SuggestionTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  BannerModelContract  $item
     *
     * @return array
     */
    public function transform(BannerModelContract $item): array;

    /**
     * Обработка коллекции объектов.
     *
     * @param $items
     *
     * @return FractalCollection
     */
    public function transformCollection($items): FractalCollection;
}
