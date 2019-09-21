<?php

namespace InetStudio\BannersPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:banners-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup banners package';

    /**
     * Инициализация команд.
     */
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
