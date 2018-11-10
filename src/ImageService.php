<?php

namespace Strattegic\PlaceImgr;

class ImageService
{
  public $name;
  public $url;

	function __construct( $placeholderServiceName )
	{
		$config = config('placeimgr.services.' . $placeholderServiceName);

    // only throw exceptions if the app is in debug mode
    if( config('app.debug') && empty( $config ) )
    {
      throw new \Exception("PlaceImgr - cannot find image service '" . $placeholderServiceName . "'");
    }

    $this -> name = $config['name'];
    $this -> url = $config['url'];
	}
}