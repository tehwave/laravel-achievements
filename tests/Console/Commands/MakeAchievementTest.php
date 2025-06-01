<?php

namespace tehwave\Achievements\Tests\Console\Commands;

use tehwave\Achievements\Tests\TestCase;

class MakeAchievementTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (file_exists($path = $this->app->path('Achievements').'/HelloWorld.php')) {
            unlink($path);
        }
    }

    /** @test */
    public function test_command_makes_file(): void
    {
        $this->artisan('make:achievement', ['name' => 'HelloWorld'])->assertExitCode(0);

        $this->assertFileExists($this->app->path('Achievements').'/HelloWorld.php');
    }
}
