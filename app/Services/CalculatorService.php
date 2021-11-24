<?php

namespace App\Services;

use App\Models\Calculator;
use App\Repositories\CalculatorRepository;

class CalculatorService
{

    private CalculatorRepository $calculatorRepository;

    const OPERATORS = ['+', '-', '*', '/', 'MOD'];

    public function __construct(
        CalculatorRepository $calculatorRepository
    )
    {
        $this->calculatorRepository = $calculatorRepository;
    }

    public function calculate(array $operation)
    {
       $this->validate($operation);
       $resultOperation = $this->execute($operation);

       $calculate = new Calculator(
           '21312',
           new \DateTime(),
           implode("", $operation),
           $resultOperation,
           0
       );

       $this->calculatorRepository->save($calculate);

       return $resultOperation;

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
        $resultFirstOperation = $this->executeOperation($firstOperation[0], $firstOperation[2], $firstOperation[1]);

        $cntLenghtOperation = count($operation);
        if ($cntLenghtOperation <= 3) {
            return $resultFirstOperation;
        }

        $secondIterator = 2;
        $timeLoop = 0;
        $nextResultOperation = 0;
        $cntOperationWithoutFirstOperation = ($cntLenghtOperation - 3);
        $nextOperation = 0;

        for ($i=0; $i <= $cntOperationWithoutFirstOperation; $i+=2) {

            if ($timeLoop == 0) {
                $nextOperation = array_slice($operation, 3);
                array_unshift($nextOperation, $resultFirstOperation);
            }

            if ($timeLoop > 0 && $secondIterator <= $cntLenghtOperation) {

                $nextResultOperation = $this->executeOperation($nextOperation[0], $nextOperation[2], $nextOperation[1]);
                $nextOperation = array_slice($nextOperation, 3);
                array_unshift($nextOperation, $nextResultOperation);
                $secondIterator += 2;
            }

            $timeLoop++;

        }

        return $nextResultOperation;

    }

    private function executeOperation($firstNumber, $secondNumber, $operator)
    {
        switch ($operator) {
            case '+':
                $className = 'App\PlusOperation';
                break;
            case '-':
                $className = 'App\MinusOperation';
                break;
            case '*':
                $className = 'App\TimesOperation';
                break;
            case '/':
                $className = 'App\DividedOperation';
                break;
            case 'MOD':
                $className = 'App\ModOperation';
                break;
            default:
                $className = 'App\PlusOperation';
        }

        $operatorInstance = new $className($firstNumber, $secondNumber);
        return $operatorInstance->execute();
    }

}
