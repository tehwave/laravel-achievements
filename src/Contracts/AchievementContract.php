<?php

namespace tehwave\Achievements\Contracts;

interface AchievementContract
{
    /**
     * Unlocks an achievement.
     *
     * @param  mixed  $achiever
     * @param  mixed  $achievement
     *
     * @return void
     */
    public static function unlock($achiever, $achievement)
}