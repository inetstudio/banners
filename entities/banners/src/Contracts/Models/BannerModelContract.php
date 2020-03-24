<?php

namespace InetStudio\BannersPackage\Banners\Contracts\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use InetStudio\AdminPanel\Base\Contracts\Models\BaseModelContract;

/**
 * Interface BannerModelContract.
 */
interface BannerModelContract extends BaseModelContract, Auditable, HasMedia
{
}
