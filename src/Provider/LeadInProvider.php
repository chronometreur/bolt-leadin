<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 4/11/16
 * Time: 12:26 PM
 */

namespace Bolt\Extension\ChronoLabs\LeadIn\Provider;

use Bolt\Extension\ChronoLabs\LeadIn\Config\Config;
use Bolt\Extension\ChronoLabs\LeadIn\Snippet\LeadInSnippet;
use Bolt\Filesystem\Handler\DirectoryInterface;
use Silex\Application;
use Silex\ServiceProviderInterface;

class LeadInProvider implements ServiceProviderInterface
{

    protected $config;

    /**
     * @var DirectoryInterface
     */
    protected $directory;

    public function __construct($config, DirectoryInterface $directory)
    {
        $this->config = $config;
        $this->directory = $directory;
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

    public function register(Application $app)
    {
        /**
         * Config class
         */
        $app['leadin.config.config'] = $app->share(
            function () {
                return new Config($this->config);
            }
        );

        /**
         * Snippets service...
         */
        $app['leadin.snippet.leadin'] = $app->share(
            function ($app) {
                return new LeadInSnippet(
                    $app['twig'],
                    $app['request_stack'],
                    $app['leadin.config.config']
                );
            }
        );
    }
}
