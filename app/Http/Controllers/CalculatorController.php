<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Logic\Calculator\SumUseCase;

class CalculatorController extends Controller
{
    public function __construct()
    {
        //
    }

    public function sum(Request $request)
    {
        $useCase = app(SumUseCase::class);
        $result = $useCase->execute($request->input("a"), $request->input("b"));
        return response()->json(["result" => $result]);
    }
}
