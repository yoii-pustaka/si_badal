<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {} // filter laporan
    public function exportPdf() {} // download laporan PDF
    public function exportExcel() {} // download laporan Excel
}
