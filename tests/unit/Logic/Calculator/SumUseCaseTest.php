<?php

namespace Logic\Calculator;

use Logic\Calculator\Repository\CalculatorRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SumUseCaseTest extends TestCase
{
    /** @var CalculatorRepository|MockObject $calculatorRepository */
    private $calculatorRepository;

    /** @var SumUseCase $useCase */
    private $useCase;

    /** @var int $result */
    private $result;

    public function testExecute(): void
    {
        $this->calculatorRepository = $this->createMock(CalculatorRepository::class);
        $this->calculatorRepository->expects($this->once())
            ->method('sum')
            ->with(2, 2)
            ->willReturn(5);

        $this->useCase = new SumUseCase($this->calculatorRepository);

        $this->result = $this->useCase->execute(2, 2);

        $this->assertEquals(5, $this->result);
    }
}
