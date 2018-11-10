<?php

namespace Strattegic\PlaceImgr;

use Illuminate\Support\Facades\Storage;
use Strattegic\PlaceImgr\ImageService;

class ImageCache
{
	/**
	*	Either cache the image, or retrieve it if it already exists.
	*/
	public static function cacheOrRetrieveUrl(ImageService $imageService, $url, $width, $height)
	{
		$fileLocation = 'public/PlaceImgrCache/' . $imageService -> name . "__" . $width . "_" . $height . ".png";

		if( !file_exists( $fileLocation ) )
		{
			$file = file_get_contents( $url );
			Storage::disk(config('placeimgr.core.cache_disk')) -> put($fileLocation, $file);
		}

		return Storage::disk(config('placeimgr.core.cache_disk')) -> url($fileLocation);;
	}
}