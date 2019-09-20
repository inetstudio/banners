<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\BannersPackage\Banners\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/banners-package',
    ],
    function () {
        Route::any('banners/data', 'DataControllerContract@data')
            ->name('back.banners-package.banners.data.index');

        Route::post('banners/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.banners-package.banners.getSuggestions');

        Route::resource(
            'banners',
            'ResourceControllerContract',
            [
                'as' => 'back.banners-package',
            ]
        );
    }
);
