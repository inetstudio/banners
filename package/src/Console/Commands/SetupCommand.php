<?php

namespace InetStudio\BannersPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

class SetupCommand extends BaseSetupCommand
{
    protected $name = 'inetstudio:banners-package:setup';

    protected $description = 'Setup banners package';

    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Banners places setup',
                'command' => 'inetstudio:banners-package:places:setup',
            ],
            [
                'type' => 'artisan',
                'description' => 'Banners groups setup',
                'command' => 'inetstudio:banners-package:groups:setup',
            ],
            [
                'type' => 'artisan',
                'description' => 'Banners setup',
                'command' => 'inetstudio:banners-package:banners:setup',
            ],
        ];
    }
}
