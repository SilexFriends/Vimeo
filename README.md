# Silex Vimeo Provider

[![Build Status](https://travis-ci.org/SilexFriends/Vimeo.svg?branch=master)](https://travis-ci.org/SilexFriends/Vimeo)
[![Code Climate](https://codeclimate.com/github/SilexFriends/Vimeo/badges/gpa.svg)](https://codeclimate.com/github/SilexFriends/Vimeo)
[![Test Coverage](https://codeclimate.com/github/SilexFriends/Vimeo/badges/coverage.svg)](https://codeclimate.com/github/SilexFriends/Vimeo/coverage)
[![Issue Count](https://codeclimate.com/github/SilexFriends/Vimeo/badges/issue_count.svg)](https://codeclimate.com/github/SilexFriends/Vimeo)


## Install

```
composer require mrprompt/silex-vimeo
```

## Usage
```
use SilexFriends\Vimeo\Vimeo;

$client_id      = getenv('VIMEO_CLIENT_ID');
$client_secret  = getenv('VIMEO_CLIENT_SECRET');
$access_token   = getenv('VIMEO_ACCESS_TOKEN');

$app = new Application;
$app->register(new Vimeo($client_id, $client_secret, $access_token));

/* @var $video array */
$video = $app['vimeo']('http://...');

var_dump($video);
```

## Tests

```
./vendor/bin/phpunit
```

## License

MIT