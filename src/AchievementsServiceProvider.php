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
        $this->bootCommands();
    }

    /**
     * Boot the custom commands.
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