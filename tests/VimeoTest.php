<?php
namespace MrPrompt\Silex\Tests;

use MrPrompt\Silex\Vimeo;
use PHPUnit_Framework_TestCase;
use Silex\Application;

/**
 * Vimeo service test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class VimeoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();

        $client_id      = getenv('VIMEO_CLIENT_ID');
        $client_secret  = getenv('VIMEO_CLIENT_SECRET');
        $access_token   = getenv('VIMEO_ACCESS_TOKEN');

        $app = new Application;
        $app->register(new Vimeo($client_id, $client_secret, $access_token));

        $this->app = $app;
    }

    public function tearDown()
    {
        $this->app = null;

        parent::tearDown();
    }

    /**
     * @test
     */
    public function createMustBeReturnArray()
    {
        $result = $this->app[Vimeo::NAME]('https://vimeo.com/27127177');

        $this->assertArrayHasKey('uri', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('link', $result);
        $this->assertArrayHasKey('embed', $result);
        $this->assertArrayHasKey('pictures', $result);
    }
}
