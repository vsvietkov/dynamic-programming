<?php

namespace Vsvietkov\DP\Problems\Fibonacci\Tabulation;

use Vsvietkov\DP\Interfaces\IProblem;

class Fibonacci implements IProblem
{
    public function getFib(int $n): int
    {
        $table = array_fill(0, abs($n) + 1, 0);
        $table[1] = 1;

        for ($i = 2; $i <= abs($n); ++$i) {
            $table[$i] += $n > 0
                ? ($table[$i - 1] + $table[$i - 2])
                : ($table[$i - 2] - $table[$i - 1]);
        }
        return $table[abs($n)];
    }
}
