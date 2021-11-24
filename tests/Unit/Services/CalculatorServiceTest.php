<?php

namespace Tests\Unit\Services;

use App\Repositories\CalculatorRepository;
use App\Services\OperatorService;
use PHPUnit\Framework\TestCase;
use App\Services\CalculatorService;

class CalculatorServiceTest extends TestCase
{
    private $calculatorService;

    public function setUp(): void
    {

        $this->calculatorRepositoryMock = $this->getMockBuilder(CalculatorRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->operatorServiceMock = $this->getMockBuilder(OperatorService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->calculatorService = new CalculatorService(
            $this->calculatorRepositoryMock,
            $this->operatorServiceMock
        );
    }

    /**
     * @test
     */
    public function shouldSumCorrectlyTwoNumbers()
    {

        $operation = ["1", "+", "1"];
        $expected = 2;

        $this->operatorServiceMock->method('execute')->willReturn(2);

        $result = $this->calculatorService->calculate($operation);
        $this->assertEquals($expected, $result['result']);
    }

    /**
     * @test
     * * @dataProvider operatorsValidantionProvider
     */
    public function shouldSumCorrectlyManyNumbers($operators, $expected)
    {

        $this->operatorServiceMock->method('execute')->willReturn($expected);

        $result = $this->calculatorService->calculate($operators);
        $this->assertEquals($expected, $result['result']);
    }

    /**
     * @test
     */
    public function shouldReturnExceptionLastValueIsAMathOperator()
    {

        $operation = ["1", "+", "1", "+"];
        $expected = 2;

        $this->operatorServiceMock->method('execute')->willReturn(2);

        $this->expectException(\UnexpectedValueException::class);

        $this->calculatorService->calculate($operation);

    }

    public function operatorsValidantionProvider()
    {
        return [
            [['1', '+', '2', '*', '3'], 19],
            [['1', '-', '1', '*', '1', '+', '3'], 3],
            [['2', '/', '2', '*', '3', '+', '1', '-', '1'], 13],
            [['5', '+', '3', '*', '5'], 40],
            [['5', '+', '1', 'MOD', '2'], 0],
        ];
    }

}
