<?php

namespace Vsvietkov\DP\Problems\GridTravel\Tabulation;

use Vsvietkov\DP\Interfaces\IProblem;

class GridTravel implements IProblem
{
    public function travel(int $rows, int $cols): int
    {
        $table = array_map(
            fn($el) => array_fill(0, $cols + 1, 0),
            array_fill(0, $rows + 1, 0)
        );
        $table[1][1] = 1;

        for ($row = 1; $row <= $rows; ++$row) {
            for ($col = 1; $col <= $cols; ++$col) {
                $elementAbove = $table[$row - 1][$col];
                $elementOnLeft = $table[$row][$col - 1];
                $table[$row][$col] += ($elementAbove + $elementOnLeft);
            }
        }
        return $table[$rows][$cols];
    }
}
