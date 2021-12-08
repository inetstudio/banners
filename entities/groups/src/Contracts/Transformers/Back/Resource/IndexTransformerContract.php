<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Resource;

use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;

interface IndexTransformerContract
{
    public function transform(GroupModelContract $item): array;
}
