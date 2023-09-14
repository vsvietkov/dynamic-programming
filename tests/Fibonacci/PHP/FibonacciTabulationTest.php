<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\Fibonacci;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\Fibonacci\Tabulation\Fibonacci;

/** @covers \Vsvietkov\DP\Problems\Fibonacci\Tabulation\Fibonacci */
class FibonacciTabulationTest extends TestCase
{
    private static Fibonacci $fibonacci;

    public static function setUpBeforeClass(): void
    {
        self::$fibonacci = new Fibonacci();
    }

    #[DataProviderExternal(FibonacciMemoizationTest::class, 'getFibDataProvider')]
    public function testGetFib(int $n, int $expectedResult): void
    {
        $this->assertEquals($expectedResult, self::$fibonacci->getFib($n));
    }
}
