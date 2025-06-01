<?php

namespace tehwave\Achievements\Tests;

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
    public function test_name_retrieved_from_class_name(): void
    {
        $achievement = new TestAchievement;
        $achievement->name = null;

        $this->assertSame('Test Achievement', $achievement->getName());
    }

    /** @test */
    public function test_icon_as_asset_keeps_http_protocol(): void
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
