<?php

namespace Logic\Calculator\Repository;

class CalculatorRepository
{
    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}
