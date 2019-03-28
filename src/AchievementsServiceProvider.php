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
}