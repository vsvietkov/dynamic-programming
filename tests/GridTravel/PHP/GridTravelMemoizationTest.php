<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\GridTravel;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\GridTravel\Memoization\GridTravel;

/** @covers \Vsvietkov\DP\Problems\GridTravel\Memoization\GridTravel */
class GridTravelMemoizationTest extends TestCase
{
    private static GridTravel $gridTravel;

    public static function setUpBeforeClass(): void
    {
        self::$gridTravel = new GridTravel();
    }

    public static function gridTravelDataProvider(): array
    {
        return [
            [1, 1, 1],
            [2, 3, 3],
            [3, 2, 3],
            [3, 3, 6],
            [18, 18, 2333606220],
        ];
    }

    #[DataProvider('gridTravelDataProvider')]
    public function testGetFib(int $rows, int $cols, int $expectedResult): void
    {
        $this->assertEquals($expectedResult, self::$gridTravel->travel($rows, $cols));
    }
}
