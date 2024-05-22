<?php

namespace App\Http\Controllers;

use App\Models\CashTransaction;
use Illuminate\Http\Request;

class CashTransactionController extends Controller
{
    public function index()
    {
        return CashTransaction::all();
    }

    public function store(Request $request)
    {
        return CashTransaction::create($request->all());
    }

    public function show(CashTransaction $cashTransaction)
    {
        return $cashTransaction;
    }

    public function update(Request $request, CashTransaction $cashTransaction)
    {
        $cashTransaction->update($request->all());

        return $cashTransaction;
    }

    public function destroy(CashTransaction $cashTransaction)
    {
        $cashTransaction->delete();

        return response()->json(null, 204);
    }
}
