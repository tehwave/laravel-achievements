<?php

namespace tehwave\Achievements\Traits;

use tehwave\Achievements\Models\Achievement;

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
