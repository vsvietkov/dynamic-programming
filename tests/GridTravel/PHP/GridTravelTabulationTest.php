<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\GridTravel;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\GridTravel\Tabulation\GridTravel;

/** @covers \Vsvietkov\DP\Problems\GridTravel\Tabulation\GridTravel */
class GridTravelTabulationTest extends TestCase
{
    private static GridTravel $gridTravel;

    public static function setUpBeforeClass(): void
    {
        self::$gridTravel = new GridTravel();
    }

    #[DataProviderExternal(GridTravelMemoizationTest::class, 'gridTravelDataProvider')]
    public function testTravel(int $rows, int $cols, int $expectedResult): void
    {
        $this->assertEquals($expectedResult, self::$gridTravel->travel($rows, $cols));
    }
}
