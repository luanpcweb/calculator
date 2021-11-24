<?php

namespace App;

interface OperationInterface
{
    public function __construct($firstNumber, $secondNumber);
    public function execute();

}
