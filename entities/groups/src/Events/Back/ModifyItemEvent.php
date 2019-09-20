<?php

namespace InetStudio\BannersPackage\Groups\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var GroupModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  GroupModelContract  $item
     */
    public function __construct(GroupModelContract $item)
    {
        $this->item = $item;
    }
}
