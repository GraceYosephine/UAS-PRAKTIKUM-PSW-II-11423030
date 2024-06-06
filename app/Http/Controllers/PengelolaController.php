<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengelolaController extends Controller
{
    public function index()
    {
        $data['pengelola'] = DB::table('pengelola')->get();

        return view('admin/pengelola', $data);
    }
}
