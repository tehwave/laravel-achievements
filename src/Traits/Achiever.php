<?php

namespace tehwave\Achievements\Traits;

use tehwave\Achievements\Achievement;
use tehwave\Achievements\Models\Achievement as AchievementModel;

trait Achiever
{
    /**
     * Get the entity's notifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function achievements()
    {
        return $this->morphMany(AchievementModel::class, 'achiever');
    }

    /**
     * Achieve an achievement.
     *
     * @param  mixed  $achievers
     * @param  mixed  $achievement
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function achieve($achievement)
    {
        return Achievement::unlock($this, $achievement);
    }
}
