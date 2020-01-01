<?php

namespace tehwave\Achievements\Tests;

class TestAchievementWithData extends TestAchievement
{
    /**
     * Get the data representation of the achievement.
     *
     * @return array
     */
    public function toDatabase()
    {
        return [
            'foo' => 'bar',
        ];
    }
}
