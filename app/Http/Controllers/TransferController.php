<?php

namespace App\Http\Controllers;

use App\Transfer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Imports\TransferImport;
use Carbon\Carbon;

class TransferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin', ['except' => 'test']);
    }


    public function index()
    {
        $data = Transfer::all();
        return view('dashboard.pages.pending_transfers', compact('data'));
    }


    public function view()
    {

        return view('dashboard.pages.transfers_list');
    }


    public function import()
    {

        Excel::import(new TransferImport, request()->file('select_file'));

        return back();
    }

    public function profile($id){

        $user = Transfer::find($id);
        return view('dashboard.pages.view_pending_transfers',compact('user'));

    }

}
