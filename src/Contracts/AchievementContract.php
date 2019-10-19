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
    public static function unlock($achiever, $achievement);

    /**
     * Get the achievement's name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the achievement's description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the achievement's icon.
     *
     * @return string
     */
    public function getIcon();

    /**
     * Get the achievement's icon as an asset.
     *
     * @return string
     */
    public function getIconAsAsset();
}
