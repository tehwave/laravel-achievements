<?php

namespace tehwave\Achievements\Tests\Models;

use tehwave\Achievements\Achievement;
use tehwave\Achievements\Tests\TestAchievement;
use tehwave\Achievements\Tests\TestAchievementWithData;
use tehwave\Achievements\Tests\TestCase;

class AchievementTest extends TestCase
{
    /** @test */
    public function test_unlocks_achievement(): void
    {
        $achievementModel = $this->testModel->achieve(new TestAchievement);

        $this->assertDatabaseHas('achievements', [
            'type' => 'tehwave\Achievements\Tests\TestAchievement',
            'achiever_type' => 'tehwave\Achievements\Tests\TestModel',
            'achiever_id' => 1,
        ]);

        $this->assertTrue($achievementModel->achiever->is($this->testModel));
    }

    /** @test */
    public function test_unlocks_achievement_with_data(): void
    {
        $achievementModel = $this->testModel->achieve(new TestAchievementWithData);

        $this->assertDatabaseHas('achievements', [
            'type' => 'tehwave\Achievements\Tests\TestAchievementWithData',
            'achiever_type' => 'tehwave\Achievements\Tests\TestModel',
            'achiever_id' => 1,
            'data' => json_encode(['foo' => 'bar']),
        ]);

        $this->assertTrue($achievementModel->achiever->is($this->testModel));
    }

    /** @test */
    public function test_retrieve_properties_via_model(): void
    {
        $achievement = new TestAchievement;

        $achievementModel = Achievement::unlock($this->testModel, $achievement);

        $this->assertSame($achievement->name, $achievementModel->name);

        $this->assertSame($achievement->description, $achievementModel->description);

        $this->assertSame($achievement->icon, $achievementModel->icon);

        $this->assertNotSame($achievement->icon, $achievementModel->icon_as_asset);
    }

    /** @test */
    public function test_model_has_achievement(): void
    {
        $achievement = new TestAchievement;

        $this->assertFalse($this->testModel->hasAchievement($achievement));

        $this->testModel->achieve($achievement);

        $this->assertTrue($this->testModel->hasAchievement($achievement));
    }
}
