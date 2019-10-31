<?php
namespace Xedi\Behat\Lumen\ServiceContainer;

use Xedi\Behat\ServiceContainer\Booter as BaseBooter;

/**
 * Boots a Lumen application
 *
 * @package Xedi\Behat
 * @author  Chris Smith <chris@xedi.com>
 */
class LumenBooter extends BaseBooter
{
    /**
     * Get the application's environment file.
     *
     * @return string
     */
    public function environmentFile()
    {
        return $this->environmentFile;
    }

    /**
     * Boot the app.
     *
     * @return mixed
     */
    public function boot()
    {
        $bootstrapPath = $this->basePath() . '/bootstrap/app.php';
        $this->assertBootstrapFileExists($bootstrapPath);

        return tap(require $bootstrapPath, function ($app) {
            $app->boot();
        });
    }
}
