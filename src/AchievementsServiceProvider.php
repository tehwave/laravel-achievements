<?php

namespace tehwave\Achievements;

use Illuminate\Support\ServiceProvider;
use tehwave\Achievements\Commands\MakeAchievement;

class AchievementsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/achievements.php' => config_path('achievements.php'),
        ], 'achievements-config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'achievements-migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAchievement::class,
            ]);
        }
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