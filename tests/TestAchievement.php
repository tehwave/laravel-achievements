<?php

namespace tehwave\Achievements\Tests;

use tehwave\Achievements\Achievement;

class TestAchievement extends Achievement
{
    /**
     * The name of this achievement.
     *
     * @var string
     */
    public $name = 'Test Achievement';

    /**
     * The description of this achievement.
     *
     * @var string
     */
    public $description = 'An achievement for testing';

    /**
     * The icon of this achievement.
     *
     * @var string
     */
    public $icon = 'TestAchievement.png';
}
