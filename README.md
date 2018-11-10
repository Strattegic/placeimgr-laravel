# PlaceImgr

A simple library to get placeholder images in Laravel.

Currently it only supports Blade directives.

```php
// creates an <img> tag with the dimensions 500x400
@placeimgr(500,400)
```

### Configure the placeholder image service

You can change the default placeholder image service by setting it in the config. For that you need to publish the config first.
```php
php artisan vendor:publish
```
After you published the PlaceImgr config you can change the **placeholder-service** value.

```php
// see the actual config for more placeholder services
'placeholder-service' => 'placecage'
```

### Using the Cache

The cache saves the images from the placeholder services so you don't have to reload them everytime you reload the app.

The internal cache utilizes the Laravel Storage facade. It uses the 'local' disk. Because of this, the storage/public and your public application folders need to be linked.
For further information see https://laravel.com/docs/5.7/filesystem#the-public-disk

```php
// you need to run this command to link the storage/public folder and your /public folder
php artisan storage:link

// after that you can enable the cache in the placeimgr.php config
'cache' => true
```