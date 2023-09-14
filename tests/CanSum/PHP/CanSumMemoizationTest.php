<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\CanSum;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\CanSum\Memoization\CanSum;

/** @covers \Vsvietkov\DP\Problems\CanSum\Memoization\CanSum */
class CanSumMemoizationTest extends TestCase
{
    private static CanSum $canSum;

    public static function setUpBeforeClass(): void
    {
        self::$canSum = new CanSum();
    }

    public static function canSumDataProvider(): array
    {
        return [
            [5, [1, 2, 7, 3], true],
            [7, [5, 3, 4, 7], true],
            [5, [2, 4, 6], false],
            [7, [2, 3], true],
            [7, [2, 4], false],
            [8, [2, 3, 5], true],
            [300, [7, 14], false],
        ];
    }

    #[DataProvider('canSumDataProvider')]
    public function testCanSum(int $targetSum, array $numbers, bool $expectedResult): void
    {
        $this->assertEquals($expectedResult, self::$canSum->canSum($targetSum, $numbers));
    }
}
