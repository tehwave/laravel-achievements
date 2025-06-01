<?php

namespace tehwave\Achievements\Tests;

use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use tehwave\Achievements\AchievementsServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * This holds an instance of TestModel.
     *
     * @var \tehwave\Achievements\Tests\TestModel
     */
    protected $testModel;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            AchievementsServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'sqlite');

        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Setup database for testing.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function setUpDatabase($app): void
    {
        $app['db']
            ->connection()
            ->getSchemaBuilder()
            ->create('test_models', function (Blueprint $table) {
                $table->increments('id');
            });

        $this->testModel = TestModel::create(['id' => 1]);

        include_once __DIR__.'/../database/migrations/2019_00_00_000000_create_achievements_table.php';

        (new \CreateAchievementsTable)->up();
    }
}
