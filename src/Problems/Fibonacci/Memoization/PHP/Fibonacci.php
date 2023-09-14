<?php

namespace Vsvietkov\DP\Problems\Fibonacci\Memoization;

use Vsvietkov\DP\Interfaces\IProblem;

class Fibonacci implements IProblem
{
    public function getFib(int $n, array &$memo = []): int
    {
        if (isset($memo[$n])) {
            // Get memoized result
            return $memo[$n];
        }

        if (in_array($n, [1, 2])) {
            // Base case
            return 1;
        }
        $result = $n > 0
            ? $this->getFib($n - 2, $memo) + $this->getFib($n - 1, $memo)
            : $this->getFib($n + 2, $memo) - $this->getFib($n + 1, $memo);
        // Memoize the result for future use
        return $memo[$n] = $result;
    }
}
