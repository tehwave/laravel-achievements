<?php

namespace tehwave\Achievements;

use Illuminate\Support\ServiceProvider;
use tehwave\Achievements\Commands\MakeAchievement;

class AchievementsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/achievements.php' => config_path('achievements.php'),
        ], 'config');

        $this->bootCommands();
    }
        $this->publishes([
            __DIR__ . '/../database/migrations/2019_00_00_000000_create_achievements_table.php' => database_path('migrations')
        ], 'migrations');

    /**
     * Boot the commands.
     *
     * @return void
     */
    private function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAchievement::class,
            ]);
        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/achievements.php', 'achievements');
    }
}