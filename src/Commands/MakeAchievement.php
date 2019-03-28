<?php

namespace tehwave\Achievements\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeAchievement extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:achievement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Achievement class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Achievement';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../Stubs/Achievement.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Achievements";
    }
}