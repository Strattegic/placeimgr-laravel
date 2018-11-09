<?php

namespace Strattegic\PlaceImgr;

use Illuminate\Support\Facades\Facade;

class PlaceImgrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'placeImgr';
    }
}