<?php

namespace Vsvietkov\DP\Problems\CanSum\Tabulation;

use Vsvietkov\DP\Interfaces\IProblem;

class CanSum implements IProblem
{
    public function canSum(int $targetSum, array $numbers): bool
    {
        $table = array_fill(0, $targetSum + 1, false);
        $table[0] = true;

        for ($i = 0; $i <= $targetSum; ++$i) {
            if (!$table[$i]) {
                continue;
            }
            foreach ($numbers as $number) {
                if (isset($table[$i + $number])) {
                    $table[$i + $number] = true;
                }
            }
        }
        return $table[$targetSum];
    }
}
