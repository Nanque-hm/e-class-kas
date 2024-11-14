<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashTransaction;
use Carbon\Carbon;

class LaporankasController extends Controller
{
    public function index()
    {
        $transactions = null;
        return view('laporan.index', compact('transactions'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $transactions = CashTransaction::whereBetween('date', [
            $request->start_date,
            $request->end_date
        ])->orderBy('date', 'asc')->get();

        return view('laporan.index', compact('transactions'));
    }
}
