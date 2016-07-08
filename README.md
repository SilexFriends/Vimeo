# Silex Vimeo Provider

[![Build Status](https://travis-ci.org/mrprompt/silex-vimeo.svg?branch=master)](https://travis-ci.org/mrprompt/silex-vimeo)

```
use SilexFriends\Vimeo\Vimeo;

...

$client_id      = getenv('VIMEO_CLIENT_ID');
$client_secret  = getenv('VIMEO_CLIENT_SECRET');
$access_token   = getenv('VIMEO_ACCESS_TOKEN');

$app = new Application;
$app->register(new Vimeo($client_id, $client_secret, $access_token));

...

/* @var $video array */
$video = $app['vimeo']('http://...');

var_dump($video);
```

:)