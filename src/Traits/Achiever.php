<?php

namespace tehwave\Achievements\Traits;

use tehwave\Achievements\Achievement;
use tehwave\Achievements\Models\Achievement as AchievementModel;

trait Achiever
{
    /**
     * Retrieve the entity's achievements.
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
     * @param  mixed  $achievement
     *
     * @return object
     */
    public function achieve($achievement)
    {
        return Achievement::unlock($this, $achievement);
    }
}
