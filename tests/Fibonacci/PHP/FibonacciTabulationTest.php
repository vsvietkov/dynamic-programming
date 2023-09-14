<?php

declare(strict_types=1);

namespace Vsvietkov\DP\Tests\Fibonacci;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vsvietkov\DP\Problems\Fibonacci\Tabulation\Fibonacci;

/** @covers \Vsvietkov\DP\Problems\Fibonacci\Tabulation\Fibonacci */
class FibonacciTabulationTest extends TestCase
{
    private Fibonacci $fibonacci;

    protected function setUp(): void
    {
        $this->fibonacci = new Fibonacci();
    }

    #[DataProviderExternal(FibonacciMemoizationTest::class, 'getFibDataProvider')]
    public function testGetFib($n, $expectedResult): void
    {
        $this->assertEquals($expectedResult, $this->fibonacci->getFib($n));
    }
}
