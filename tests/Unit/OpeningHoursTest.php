<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\OpeningHour;
use App\Services\OpeningHours;
use Database\Seeders\OpeningHoursSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpeningHoursTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(OpeningHoursSeeder::class);
    }

    public function testNextOpenReturnsNearestFutureOpeningDateTime(): void
    {
        $openingHoursService = new OpeningHours();
        $closed = new \DateTime('Tuesday 13:00');
        $shouldBeNextOpen = new \DateTime('Wednesday 08:00');
        $nextOpen = $openingHoursService->nextOpen($closed);
        $this->assertNotNull(
            $nextOpen,
            'In this testcase, null should not be returned. Check data and proceed carefully.'
        );
        $this->assertEquals($shouldBeNextOpen, $nextOpen);
    }

    public function testIsOpenReturnsFalseWhenOutsideOpeningHours(): void
    {
        $openingHoursService = new OpeningHours();
        $closed = new \DateTime('Tuesday 13:00');
        $isClosed = $openingHoursService->isOpen($closed);
        $this->assertFalse($isClosed);
    }

    public function testIsOpenReturnsTrueWhenInsideOpeningHours(): void
    {
        $openingHoursService = new OpeningHours();
        $open = new \DateTime('Wednesday 14:00');
        $isOpen = $openingHoursService->isOpen($open);
        $this->assertTrue($isOpen);
    }

    public function testWeekRepeatMode(): void
    {
        $openingHoursService = new OpeningHours();
        $weekRepeatMode = $openingHoursService->getWeekRepeatMode(40);
        $this->assertEquals(OpeningHour::REPEAT_EVEN_WEEKS, $weekRepeatMode);
        $weekRepeatMode = $openingHoursService->getWeekRepeatMode(41);
        $this->assertEquals(OpeningHour::REPEAT_ODD_WEEKS, $weekRepeatMode);
    }
}
