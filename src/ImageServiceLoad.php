<?php

namespace Strattegic\PlaceImgr;

trait ImageServiceLoad 
{
	protected $imageService;

	protected function loadCurrentImageService()
  {
    $placeholderServiceName = config('placeimgr.placeholder-service');

    $this -> imageService = new ImageService($placeholderServiceName);
  }	
}