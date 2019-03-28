<?php

namespace tehwave\Achievements\Traits;

trait Achiever
{
    /**
     * Get the entity's notifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function achievements()
    {
        return $this->morphMany(Achievement::class, 'achiever');
    }
}
