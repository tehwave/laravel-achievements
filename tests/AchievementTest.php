<?php

namespace tehwave\Achievements\Tests;

use tehwave\Achievements\Achievement;
use tehwave\Achievements\Tests\TestCase;
use tehwave\Achievements\Tests\TestAchievement;
use tehwave\Achievements\Models\Achievement as AchievementModel;

class AchievementTest extends TestCase
{
    /**
     * Icon asset with HTTP-protocol.
     *
     * @var string
     */
    protected $httpIcon = 'http://localhost/TestAchievement.png';

    /**
     * Icon asset with HTTPS-protocol.
     *
     * @var string
     */
    protected $httpsIcon = 'https://localhost/TestAchievement.png';

    /**
     * Icon asset without protocol.
     *
     * @var string
     */
    protected $sansHttpIcon = '//localhost/TestAchievement.png';

    /** @test */
    public function testNameRetrievedFromClassName(): void
    {
        $achievement = new TestAchievement;
        $achievement->name = null;

        $this->assertSame(' Test Achievement', $achievement->getName());
    }

    /** @test */
    public function testIconAsAssetKeepsHttpProtocol(): void
    {
        $achievement = new TestAchievement;

        $achievement->icon = $this->httpIcon;
        $this->assertSame($this->httpIcon, $achievement->getIconAsAsset());

        $achievement->icon = $this->httpsIcon;
        $this->assertSame($this->httpsIcon, $achievement->getIconAsAsset());

        $achievement->icon = $this->sansHttpIcon;
        $this->assertSame($this->sansHttpIcon, $achievement->getIconAsAsset());
    }
}
