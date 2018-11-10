<?php

return [

	/**
		One of the following services can be used:
	 
		dummyimage
		lorempixel
		placeholder
		placeimg
		loremflicker
		
		placekitten		- as it says: cute kittens
		placebeard		- for the tough developer
		baconmockup		- for the meat friends
		placebeard		- beardy images
		placecage			- the one true god
		placezombie		- for a bit of horror

	**/
	'placeholder-service' => 'placekitten',

	/**
	*	Toggles the caching of placeholder images.
	*	For this to work, your application needs to have access to the 'local' disk
	* More information: 
	*	@link https://laravel.com/docs/5.7/filesystem#the-public-disk
	*/
	'cache' => false,

];