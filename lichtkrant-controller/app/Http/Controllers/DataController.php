<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function showCurrentData() {
        $data = DB::table('current')->get();
        return $data;
    }
    
}
