<?php

namespace Logic\Calculator;

class SumUseCase
{
    public function execute(int $a, int $b): int
    {
        return $a + $b;
    }
}
