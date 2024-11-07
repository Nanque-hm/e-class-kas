<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::orderBy('date', 'desc')->get();
        return view('kas.index', compact('kas'));
    }

    public function create()
    {
        return view('kas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'date' => 'required|date'
        ]);

        Kas::create($request->all());
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $kas = Kas::findOrFail($id);
        return view('kas.edit', compact('kas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update($request->all());
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $kas = Kas::findOrFail($id);
        $kas->delete();
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil dihapus');
    }
}