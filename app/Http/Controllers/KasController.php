<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::with('student')->latest()->get();
        $totalSaldo = Kas::sum('nominal'); // Menghitung total semua kas
        return view('kas.index', compact('kas', 'totalSaldo'));
    }

    public function create()
    {
        $students = Student::all();
        return view('kas.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'nominal' => 'required|numeric',
            'date' => 'required|date'
        ]);

        Kas::create([
            'student_id' => $request->student_id,
            'nominal' => $request->nominal,
            'date' => $request->date
        ]);

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $students = Student::all();
        $kas = Kas::findOrFail($id);
        return view('kas.edit', compact('kas', 'students'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'nominal' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update([
            'student_id' => $request->student_id,
            'nominal' => $request->nominal,
            'date' => $request->date
        ]);

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $kas = Kas::findOrFail($id);
        $kas->delete();
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil dihapus');
    }

    // Menambahkan method untuk mendapatkan total saldo per siswa
    public function totalPerStudent()
    {
        $totalPerStudent = Kas::select('student_id', DB::raw('SUM(nominal) as total'))
            ->groupBy('student_id')
            ->with('student')
            ->get();

        return view('kas.total-per-student', compact('totalPerStudent'));
    }

    // Menambahkan method untuk mendapatkan total saldo per bulan
    public function totalPerMonth()
    {
        $totalPerMonth = Kas::select(
            DB::raw('MONTH(date) as month'),
            DB::raw('YEAR(date) as year'),
            DB::raw('SUM(nominal) as total')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('kas.total-per-month', compact('totalPerMonth'));
    }

    
}
