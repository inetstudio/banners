<?php

namespace InetStudio\BannersPackage\Groups\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;

interface ItemsServiceContract extends BaseServiceContract
{
    public function save(array $data, int $id): GroupModelContract;

    public function attachToObject($groupsIds, $item);
}
