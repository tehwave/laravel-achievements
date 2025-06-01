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
     * The icon of this achievement.
     *
     * @var string
     */
    public $icon;

    /**
     * Get the name of this achievement.
     *
     * @return string
     */
    public function getName()
    {
        if (empty($this->name)) {
            return preg_replace(
                '/([a-z])([A-Z])/s',
                '$1 $2',
                class_basename($this)
            );
        }

        return $this->name;
    }

    /**
     * Get the description of this achievement.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the icon of this achievement.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Get the icon of this achievement with path.
     *
     * @return string
     */
    public function getIconAsAsset()
    {
        if (Str::startsWith($this->icon, ['http://', 'https://', '//'])) {
            return $this->icon;
        }

        return asset($this->icon);
    }

    /**
     * Get the data of the achievement.
     *
     * @param  mixed  $achievement
     * @return array
     */
    public function getData($achievement)
    {
        if (method_exists($achievement, 'toDatabase')) {
            return is_array($data = $achievement->toDatabase())
                ? $data : $data->data;
        }
    }

    /**
     * Unlocks an achievement.
     *
     * @param  mixed  $achiever
     * @param  mixed  $achievement
     * @param  array|null  $data
     * @return object
     */
    public static function unlock($achiever, $achievement, $data = null)
    {
        $type = $achievement;

        if ($achievement instanceof self) {
            $type = get_class($achievement);
        }

        return $achiever->achievements()->create([
            'id' => Str::uuid()->toString(),
            'type' => $type,
            'data' => $data ?? optional($achievement)->getData($achievement),
        ]);
    }

    /**
     * Get the all of the achievement classes.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getClasses()
    {
        $directory = app()->path('Achievements');

        return collect(scandir($directory))
            ->diff(['..', '.'])
            ->values();
    }

    /**
     * Get the all of the achievement classes in namespace.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getNamespacedClasses()
    {
        return self::getClasses()
            ->transform(function ($class) {
                return sprintf(
                    '%sAchievements\%s',
                    app()->getNamespace(),
                    rtrim($class, '.php')
                );
            });
    }

    /**
     * Get the all of the achievement classes instantiated.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getClassesInstantiated()
    {
        return self::getNamespacedClasses()
            ->transform(function ($class) {
                return new $class;
            });
    }

    /**
     * Shorthand function for getInstantiatedClasses.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function all()
    {
        return self::getClassesInstantiated();
    }
}
