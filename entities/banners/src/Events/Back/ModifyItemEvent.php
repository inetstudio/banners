<?php

namespace InetStudio\BannersPackage\Banners\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;
use InetStudio\BannersPackage\Banners\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var BannerModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  BannerModelContract  $item
     */
    public function __construct(BannerModelContract $item)
    {
        $this->item = $item;
    }
}
