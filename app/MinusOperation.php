<?php

namespace App;

use phpDocumentor\Reflection\Types\Mixed_;

class MinusOperation implements OperationInterface
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
    }

    /**
     * @return float|int
     */
    public function execute()
    {
        return $this->firstNumber - $this->secondNumber;
    }
}
