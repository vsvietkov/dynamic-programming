<?php

namespace Vsvietkov\DP\Problems\CanSum\Memoization;

use Vsvietkov\DP\Interfaces\IProblem;

class CanSum implements IProblem
{
    public function canSum(int $targetSum, array $numbers, array &$memo = []): bool
    {
        if (isset($memo[$targetSum])) {
            return $memo[$targetSum];
        } elseif ($targetSum === 0) {
            return true;
        } elseif ($targetSum < 0) {
            return false;
        }

        foreach ($numbers as $number) {
            $difference = $targetSum - $number;

            if ($this->canSum($difference, $numbers, $memo)) {
                return true;
            }
        }
        return $memo[$targetSum] = false;
    }
}
