<?php

namespace tehwave\Achievements\Tests\Models;

use tehwave\Achievements\Achievement;
use tehwave\Achievements\Tests\TestCase;
use tehwave\Achievements\Tests\TestAchievement;
use tehwave\Achievements\Tests\TestAchievementWithData;
use tehwave\Achievements\Models\Achievement as AchievementModel;

class AchievementTest extends TestCase
{
    /** @test */
    public function testUnlocksAchievement(): void
    {
        $achievementModel = $this->testModel->achieve(new TestAchievement);

        $this->assertDatabaseHas('achievements', [
            'type'              => 'tehwave\Achievements\Tests\TestAchievement',
            'achiever_type'     => 'tehwave\Achievements\Tests\TestModel',
            'achiever_id'       => 1,
        ]);

        $this->assertTrue($achievementModel->achiever->is($this->testModel));
    }

    /** @test */
    public function testUnlocksAchievementWithData(): void
    {
        $achievementModel = $this->testModel->achieve(new TestAchievementWithData);

        $this->assertDatabaseHas('achievements', [
            'type'              => 'tehwave\Achievements\Tests\TestAchievementWithData',
            'achiever_type'     => 'tehwave\Achievements\Tests\TestModel',
            'achiever_id'       => 1,
            'data'              => json_encode(['foo' => 'bar']),
        ]);

        $this->assertTrue($achievementModel->achiever->is($this->testModel));
    }

    /** @test */
    public function testRetrievePropertiesViaModel(): void
    {
        $achievement = new TestAchievement;

        $achievementModel = Achievement::unlock($this->testModel, $achievement);

        $this->assertSame($achievement->name, $achievementModel->name);

        $this->assertSame($achievement->description, $achievementModel->description);

        $this->assertSame($achievement->icon, $achievementModel->icon);

        $this->assertNotSame($achievement->icon, $achievementModel->icon_as_asset);
    }
}
