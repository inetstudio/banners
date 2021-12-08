<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Utility;

use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;

interface SuggestionTransformerContract
{
    public function transform(GroupModelContract $item): array;

    public function transformCollection($items): FractalCollection;
}
