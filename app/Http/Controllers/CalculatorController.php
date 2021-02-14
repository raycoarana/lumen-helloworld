<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Logic\Core\IoC;
use Logic\Calculator\SumUseCase;

class CalculatorController extends Controller
{
    public function sum(Request $request): JsonResponse
    {
        /** @var SumUseCase $useCase */
        $useCase = IoC::inject(SumUseCase::class);
        $result = $useCase->execute($request->input("a"), $request->input("b"));
        return response()->json(["result" => $result]);
    }
}
