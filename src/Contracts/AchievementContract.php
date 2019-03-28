<?php

namespace tehwave\Achievements\Contracts;

interface AchievementContract
{
    /**
     * Unlocks an achievement.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $achievers
     * @param  mixed  $achievement
     *
     * @return void
     */
    public static function unlock($achievers, $achievement)
}