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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = config('achievements.table', 'achievements');

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
     * Get the achiever entity that the achievement belongs to.
     */
    public function achiever()
    {
        return $this->morphTo();
    }
}