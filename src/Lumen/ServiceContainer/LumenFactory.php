<?php

namespace Xedi\Behat\Lumen\ServiceContainer;

use Xedi\Behat\ServiceContainer\Factory as BaseFactory;

class LumenFactory extends BaseFactory
{
    /**
     * {@inheritdoc}
     */
    public function getDriverName()
    {
        return 'lumen';
    }

    public function getDriverReference()
    {
        return 'lumen.app';
    }

    public function buildDriver(array $config)
    {
        $this->assertBrowserKitIsAvailable();

        return new Definition(
            LumenDriver::class,
            [
                new Reference('lumen.app'),
                '%mink.base_url%'
            ]
        );
    }
}