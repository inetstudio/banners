<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Services\Back;

use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;

interface UtilityServiceContract extends BaseServiceContract
{
    public function getSuggestions(string $search): Collection;
}
