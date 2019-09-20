<?php

return [

    /*
     * Расширение файла конфигурации app/config/filesystems.php
     * добавляет локальные диски для хранения изображений баннеров
     */

    'banners' => [
        'driver' => 'local',
        'root' => storage_path('app/public/banners'),
        'url' => env('APP_URL').'/storage/banners',
        'visibility' => 'public',
    ],

];
