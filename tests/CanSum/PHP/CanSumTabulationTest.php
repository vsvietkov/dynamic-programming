<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\CanSum;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\CanSum\Tabulation\CanSum;

/** @covers \Vsvietkov\DP\Problems\CanSum\Tabulation\CanSum */
class CanSumTabulationTest extends TestCase
{
    private static CanSum $canSum;

    public static function setUpBeforeClass(): void
    {
        self::$canSum = new CanSum();
    }

    #[DataProviderExternal(CanSumMemoizationTest::class, 'canSumDataProvider')]
    public function testCanSum(int $targetSum, array $numbers, bool $expectedResult): void
    {
        $this->assertEquals($expectedResult, self::$canSum->canSum($targetSum, $numbers));
    }
}
