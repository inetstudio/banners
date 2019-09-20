<?php

namespace InetStudio\BannersPackage\Places\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\BannersPackage\Places\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var PlaceModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  PlaceModelContract  $item
     */
    public function __construct(PlaceModelContract $item)
    {
        $this->item = $item;
    }
}
