<?php

namespace App\Http\Controllers;

use App\Models\WmtTransactionHeader;
use Illuminate\Http\Request;

class Wmt_Report_Penjualan_Controller extends Controller
{
    public function index(){
        return view('report_penjualan', [
            'title' => 'History Penjualan',
            'transactionheader' => WmtTransactionHeader::With('getDetail')->get()
        ]);
    }
}
