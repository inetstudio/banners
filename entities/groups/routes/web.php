<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\BannersPackage\Groups\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/banners-package',
    ],
    function () {
        Route::any('groups/data', 'DataControllerContract@data')
            ->name('back.banners-package.groups.data.index');

        Route::post('groups/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.banners-package.groups.getSuggestions');

        Route::resource(
            'groups',
            'ResourceControllerContract',
            [
                'except' => [
                    'show',
                ],
                'as' => 'back.banners-package',
            ]
        );
    }
);
