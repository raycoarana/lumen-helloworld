<?php

namespace Logic\Calculator\Repository;

use PHPUnit\Framework\TestCase;

class CalculatorRepositoryTest extends TestCase
{
    /** @var CalculatorRepository $repository */
    private $repository;
    /** @var int $result */
    private $result;

    public function testSum(): void
    {
        $this->repository = new CalculatorRepository();

        $this->result = $this->repository->sum(2, 4);

        $this->assertEquals(6, $this->result);
    }
}
