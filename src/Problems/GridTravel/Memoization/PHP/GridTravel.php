<?php

namespace Vsvietkov\DP\Problems\GridTravel\Memoization;

use Vsvietkov\DP\Interfaces\IProblem;

class GridTravel implements IProblem
{
    public function travel(int $rows, int $cols, array &$memo = []): int
    {
        if (isset($memo[$rows][$cols]) || isset($memo[$cols][$rows])) {
            // Get memoized value
            return $memo[$rows][$cols] ?? $memo[$cols][$rows];
        } elseif (in_array(0, [$rows, $cols])) {
            // Base case
            return 0;
        } elseif (in_array(1, [$rows, $cols])) {
            // Base case
            return 1;
        }
        $memo[$rows][$cols] = $this->travel($rows - 1, $cols, $memo) + $this->travel($rows, $cols - 1, $memo);

        return $memo[$rows][$cols];
    }
}
