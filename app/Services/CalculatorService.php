<?php

namespace App\Services;

use App\Models\Calculator;
use App\Repositories\CalculatorRepository;
use App\Services\OperatorService;

class CalculatorService
{
    /**
     * Const Operators
     */
    const OPERATORS = ['+', '-', '*', '/', 'MOD'];

    /**
     * @var CalculatorRepository
     */
    private CalculatorRepository $calculatorRepository;

    /**
     * @var \App\Services\OperatorService
     */
    private OperatorService $operatorService;

    /**
     * @var
     */
    private $ip;

    /**
     * @param CalculatorRepository $calculatorRepository
     * @param \App\Services\OperatorService $operatorService
     */
    public function __construct(
        CalculatorRepository $calculatorRepository,
        OperatorService $operatorService
    )
    {
        $this->calculatorRepository = $calculatorRepository;
        $this->operatorService = $operatorService;
    }

    /**
     * @param $ip
     */
    public function ip($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @param array $operation
     * @return array
     */
    public function calculate(array $operation)
    {
       $this->validate($operation);
       $resultOperation = $this->execute($operation);

       $bonus = $this->isBonus($operation, $resultOperation);

       $calculate = new Calculator(
           $this->ip ?? 0,
           new \DateTime(),
           implode("", $operation),
           $resultOperation,
           $bonus
       );

       $this->calculatorRepository->save($calculate);

       return ['result' => $resultOperation, 'bonus' => $bonus];

    }

    private function validate(array $operation)
    {

        $count = count($operation);
        if ($count < 3) {
            throw new \UnexpectedValueException('Invalid operation.');
        }

        $lastValueOfOperation = end($operation);
        if (in_array($lastValueOfOperation, self::OPERATORS)) {
            throw new \UnexpectedValueException('Last value is a math operator.');
        }
    }

    private function execute(array $operation)
    {
        $firstOperation = array_slice($operation, 0, 3);
        $resultFirstOperation = $this->operatorService->execute($firstOperation[0], $firstOperation[2], $firstOperation[1]);

        $cntLengthOperation = count($operation);
        if ($cntLengthOperation <= 3) {
            return $resultFirstOperation;
        }

        $secondIterator = 2;
        $timeLoop = 0;
        $nextResultOperation = 0;
        $cntOperationWithoutFirstOperation = ($cntLengthOperation - 3);
        $nextOperation = 0;

        for ($i=0; $i <= $cntOperationWithoutFirstOperation; $i+=2) {

            if ($timeLoop == 0) {
                $nextOperation = array_slice($operation, 3);
                array_unshift($nextOperation, $resultFirstOperation);
            }

            if ($timeLoop > 0 && $secondIterator <= $cntLengthOperation) {

                $nextResultOperation = $this->operatorService->execute($nextOperation[0], $nextOperation[2], $nextOperation[1]);
                $nextOperation = array_slice($nextOperation, 3);
                array_unshift($nextOperation, $nextResultOperation);
                $secondIterator += 2;
            }

            $timeLoop++;

        }

        return $nextResultOperation;

    }

    /**
     * @param $operation
     * @param $resultOperation
     * @return int
     */
    private function isBonus($operation, $resultOperation): int
    {
        if (in_array($resultOperation, $operation)) {
            return 1;
        }

        return 0;
    }

}
