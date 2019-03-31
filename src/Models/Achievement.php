<?php

namespace tehwave\Achievements\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('achievements.table', 'achievements');
    }

    /**
     * Get the achievement class associated with the model.
     *
     * @return string
     */
    public function getClass()
    {
        return app($this->type);
    }

    /**
     * Get the achievement's name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->getClass()->getName();
    }

    /**
     * Get the achievement's description.
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->getClass()->getDescription();
    }

    /**
     * Get the achiever entity that the achievement belongs to.
     */
    public function achiever()
    {
        return $this->morphTo();
    }
}
