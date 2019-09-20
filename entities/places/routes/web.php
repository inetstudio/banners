<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\BannersPackage\Places\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/banners-package',
    ],
    function () {
        Route::any('places/data', 'DataControllerContract@data')
            ->name('back.banners-package.places.data.index');

        Route::post('places/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.banners-package.places.getSuggestions');

        Route::resource(
            'places',
            'ResourceControllerContract',
            [
                'as' => 'back.banners-package',
            ]
        );
    }
);
