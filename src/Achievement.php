<?php

namespace tehwave\Achievements;

use Illuminate\Support\Str;
use tehwave\Achievements\Contracts\AchievementContract;

class Achievement implements AchievementContract
{
    /**
     * The name of this achievement.
     *
     * @var string
     */
    public $name;

    /**
     * The description of this achievement.
     *
     * @var string
     */
    public $description;

    /**
     * Get the name of this achievement.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the description of this achievement.
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get the data of the achievement.
     *
     * @param  mixed  $achievement
     * @return array
     *
     * @throws \RuntimeException
     */
    protected function getData($achievement)
    {
        if (method_exists($achievement, 'toDatabase')) {
            return is_array($data = $achievement->toDatabase())
                                ? $data : $data->data;
        }

        throw new RuntimeException('Achievement is missing toDatabase method.');
    }

    /**
     * Unlocks an achievement.
     *
     * @param  mixed  $achievers
     * @param  mixed  $achievement
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function unlock($achiever, $achievement)
    {
        return $achiever->achievements()->create([
            'id' => Str::uuid()->toString(),
            'type' => get_class($achievement),
            'data' => $achievement->getData($achievement),
        ]);
    }
}
