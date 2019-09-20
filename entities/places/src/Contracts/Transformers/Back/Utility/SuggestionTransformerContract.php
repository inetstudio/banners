<?php

namespace InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Utility;

use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;

/**
 * Interface SuggestionTransformerContract.
 */
interface SuggestionTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  PlaceModelContract  $item
     *
     * @return array
     */
    public function transform(PlaceModelContract $item): array;

    /**
     * Обработка коллекции объектов.
     *
     * @param $items
     *
     * @return FractalCollection
     */
    public function transformCollection($items): FractalCollection;
}
