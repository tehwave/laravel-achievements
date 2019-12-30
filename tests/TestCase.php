<?php

namespace tehwave\Achievements\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use tehwave\Achievements\AchievementsServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            AchievementsServiceProvider::class,
        ];
    }
}
