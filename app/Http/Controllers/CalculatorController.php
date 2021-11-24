<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculatorService;

class CalculatorController extends Controller
{

    /**
     * @var CalculatorService
     */
    private $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function index()
    {
        return view('index');
    }

    public function calculate(Request $request)
    {

        try {
            $operation = $request->get('operation');
            $result = $this->calculatorService->calculate($operation);
            return response()->json(['result' => $result, 'bonus' => 0], 200);
        } catch(\UnexpectedValueException $e) {
            return response()->json(['result' => '0', 'msg' => $e->getMessage()], 500);
        }
    }
}
