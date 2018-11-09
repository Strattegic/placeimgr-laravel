<?php

namespace Strattegic\PlaceImgr;

class PlaceImgr
{
	protected $service;

	function __construct()
	{
  	$this -> service = config('placeholders.services.' . config('placeholders.placeholder-service'));

  	if( config('app.debug') && empty( $this -> service ) )
  	{
  		throw new \Exception("PlaceImgr - cannot find image service '" . config('placeholders.placeholder-service')."'");
  		
  	}
	}

  public function make($width, $height, $class = null)
  {
  	return $this -> getImageHtmlTag($width, $height);
  }

  private function getImageHtmlTag($width, $height)
  {
  	$url = $this -> service['url'];

  	$url = str_replace(":width", $width, $url);
  	$url = str_replace(":height", $height, $url);

  	return "<img src='" . $url . "'>";
  }
}