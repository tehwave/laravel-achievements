<?php

namespace tehwave\Achievements;

use Illuminate\Support\ServiceProvider;
use tehwave\Achievements\Commands\MakeAchievement;

class AchievementsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/achievements.php' => config_path('achievements.php'),
        ], 'config');

        $this->bootCommands();
    }

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