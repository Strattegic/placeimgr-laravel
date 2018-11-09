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
