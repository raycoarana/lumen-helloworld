<?php

namespace Logic\Calculator;

use Logic\Calculator\Repository\CalculatorRepository;

class SumUseCase
{
    /** @var CalculatorRepository $repository */
    private $repository;

    public function __construct(CalculatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $a, int $b): int
    {
        return $this->repository->sum($a, $b);
    }
}
