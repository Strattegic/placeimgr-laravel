<?php

namespace Strattegic\PlaceImgr;

class PlaceImgr extends PlaceImgrBase
{
  /**
  * Public function to create a new img- HTML tag
  * 
  * @param int $width - width of the placeholder
  * @param int $height - height of the placeholder
  * @param String $class - comma separated class names
  *
  * @return img-Tag
  **/
  public function make($width, $height, $class = null)
  {
  	return $this -> getImageHtmlTag($width, $height);
  }
}