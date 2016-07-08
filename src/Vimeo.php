<?php
declare(strict_types = 1);

namespace SilexFriends\Vimeo;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Vimeo\Vimeo as VimeoDriver;

/**
 * Vimeo Service
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class Vimeo implements VimeoInterface, ServiceProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * Constructor
     *
     * @param string $id
     * @param string $secret
     * @param string $token
     */
    public function __construct(string $id, string $secret, string $token)
    {
        $this->config = [
            'client_id'     => $id,
            'client_secret' => $secret,
            'access_token'  => $token
        ];
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::register()
     * @param Application $app
     */
    public function register(Application $app)
    {
        $service        = $this;

        $app[static::NAME] = $app->protect(
            function ($url) use ($service, $app) {
                return $service->create($url);
            }
        );
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::boot()
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // :)
    }

    /**
     * Create a Vimeo media
     *
     * @param string $url
     * @return array
     */
    public function create(string $url): array
    {
        $config   = $this->config;

        /* @var $service VimeoDriver */
        $service  = new VimeoDriver($config['client_id'], $config['client_secret'], $config['access_token']);

        $parsed   = parse_url($url);
        $uri      = explode('/', $parsed['path']);
        $videoId  = array_pop($uri);

        $response = $service->request('/videos/' . $videoId, [], 'GET');
        $video    = $response['body'];

        return $video;
    }
}
