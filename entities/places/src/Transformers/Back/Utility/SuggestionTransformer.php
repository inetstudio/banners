<?php

namespace InetStudio\BannersPackage\Places\Transformers\Back\Utility;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Transformers\Back\Utility\SuggestionTransformerContract;

class SuggestionTransformer extends TransformerAbstract implements SuggestionTransformerContract
{
    protected string $type;

    public function __construct(string $type = '')
    {
        $this->type = $type;
    }

    public function transform(PlaceModelContract $item): array
    {
        $itemData = [
            'id' => $item['id'],
            'name' => $item['name'],
        ];

        return ($this->type == 'autocomplete')
            ? [
                'value' => $item['name'],
                'data' => $itemData,
            ]
            : $itemData;
    }

    public function transformCollection($items): FractalCollection
    {
        return new FractalCollection($items, $this);
    }
}
