<?php

namespace tehwave\Achievements;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use tehwave\Achievements\Contracts\AchievementContract;
use Illuminate\Database\Eloquent\Collection as ModelCollection;

abstract class Achievement implements AchievementContract
{
    /**
     * The unique identifier for the achievement.
     *
     * @var string
     */
    public $id;

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
     * Get the identifier for this achievement.
     *
     * @return string
     */
    protected function getId() {
        return $this->id ?? ;
    }

    /**
     * Get the type of this achievement.
     *
     * @return string
     */
    protected function getType() {
        return get_class($this);
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
     * @param  \Illuminate\Support\Collection|array|mixed  $achievers
     * @param  mixed  $achievement
     *
     * @return void
     */
    public static function unlock($achievers, $achievement) {
       $achievers = $this->formatAchievers($achievers);

       $achievers->each()->achievements()->create([
            'id' => Str::uuid()->toString(),
            'type' => get_class($achievement),
            'data' => $achievement->getData(),
        ]);
    }

    /**
     * Format the achievers into a Collection / array if necessary.
     *
     * @param  mixed  $achievers
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    protected function formatAchievers($achievers)
    {
        if (! $achievers instanceof Collection && ! is_array($achievers)) {
            return $achievers instanceof Model
                            ? new ModelCollection([$achievers]) : [$achievers];
        }

        return $achievers;
    }
}