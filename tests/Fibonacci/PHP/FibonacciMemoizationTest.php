<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\Fibonacci;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\Fibonacci\Memoization\Fibonacci;

/** @covers \Vsvietkov\DP\Problems\Fibonacci\Memoization\Fibonacci */
class FibonacciMemoizationTest extends TestCase
{
    private Fibonacci $fibonacci;

    protected function setUp(): void
    {
        $this->fibonacci = new Fibonacci();
    }

    public static function getFibDataProvider(): array
    {
        return [
            [-10, -55],
            [-6, -8],
            [0, 0],
            [2, 1],
            [3, 2],
            [6, 8],
            [10, 55],
            [19, 4181],
            [50, 12586269025],
        ];
    }

    #[DataProvider('getFibDataProvider')]
    public function testGetFib($n, $expectedResult): void
    {
        $this->assertEquals($expectedResult, $this->fibonacci->getFib($n));
    }
}
