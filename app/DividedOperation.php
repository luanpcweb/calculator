<?php

namespace App;

use Doctrine\Instantiator\Exception\UnexpectedValueException;

class DividedOperation implements OperationInterface
{

    /**
     * @var
     */
    private $firstNumber;

    /**
     * @var
     */
    private $secondNumber;

    /**
     * @param $firstNumber
     * @param $secondNumber
     */
    public function __construct($firstNumber, $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;

        if ($this->firstNumber == 0 || $this->secondNumber == 0) {
            throw new UnexpectedValueException('Number cannot be divided by zero!');
        }
    }

    /**
     * @return float|int
     */
    public function execute()
    {
        return $this->firstNumber / $this->secondNumber;
    }
}
