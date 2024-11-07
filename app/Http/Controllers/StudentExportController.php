<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class StudentExportController extends Controller
{
    /**
     * Method untuk mengunduh file Excel berisi data student
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        // Mengekspor data student dan mengunduhnya sebagai file Excel
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
