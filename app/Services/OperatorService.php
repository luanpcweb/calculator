<?php

namespace App\Services;

class OperatorService
{

    public function execute($firstNumber, $secondNumber, $operator)
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
