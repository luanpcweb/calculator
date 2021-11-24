<?php

namespace App\Repositories;

use App\Models\Calculator;
use Illuminate\Support\Facades\DB;

class CalculatorRepository
{

    public function save(Calculator $calculator)
    {

        try {
            DB::insert("INSERT INTO calculator(ip, timestamp, operation, result, bonus) VALUES (?,?,?,?,?)", [
                $calculator->getIp(),
                $calculator->getTimestamp(),
                $calculator->getOperation(),
                $calculator->getResult(),
                $calculator->getBonus()
            ]);
        } catch(\UnexpectedValueException $e) {

        }
    }
}
