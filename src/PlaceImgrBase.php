<?php

namespace Strattegic\PlaceImgr;

use Strattegic\PlaceImgr\ImageCache;

class PlaceImgrBase
{
  use \Strattegic\PlaceImgr\ImageServiceLoad;

  protected $imageCache;

	function __construct(ImageCache $cache)
	{
    $this -> loadCurrentImageService();
    $this -> imageCache = $cache;
	}

  protected function getImageHtmlTag($width, $height)
  {
    $url = $this -> replaceUrlParams($width, $height);

    // Cached version?
    if( config('placeimgr.cache') )
    {
      $url = $this -> imageCache -> cacheOrRetrieveUrl( $this -> imageService, $url, $width, $height );
    }

    // return the img tag
  	return "<img src='" . $url . "'>";
  }

  private function replaceUrlParams($width, $height)
  {
    $url = $this -> imageService -> url;
    $serviceName = $this -> imageService -> name;

    $url = str_replace(":width", $width, $url);
    $url = str_replace(":height", $height, $url);

    return $url;
  }
}