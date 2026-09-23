<?php

use Laravel\Fortify\Features;

return [

    /*
    --------------------------------------------------------------------------
    | Home Path
    --------------------------------------------------------------------------
    |
    | Here you may specify the path to which users will be redirected when they
    | are successfully authenticated.
    |
    */

    'home' => '/posts',

    /*
    --------------------------------------------------------------------------
    | Features
    --------------------------------------------------------------------------
    |
    | Some features are optional. You may disable the features by removing
    | them from this array.
    |
    */

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        // Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
    ],

];