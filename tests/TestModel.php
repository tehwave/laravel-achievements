<?php

namespace tehwave\Achievements\Tests;

use Illuminate\Database\Eloquent\Model;
use tehwave\Achievements\Traits\Achiever;

class TestModel extends Model
{
    use Achiever;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test_models';

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
