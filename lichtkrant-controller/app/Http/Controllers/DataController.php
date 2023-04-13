<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Current;


class DataController extends Controller
{
    public function showCurrentData() {
        $data = DB::table('current')->get();
        return $data;
    }
    
    public function index(){
        $textPresets = DB::table('textPresets')->get();
        return view('index', ['textPresets' => $textPresets]);
    }

    public function updateText(Request $request){
        $current = current::find(1);
        $current->text = $request->input('text');
        $current->save();
    return redirect('/')->with('success', 'Text saved successfully!');
    }

    public function updateColour(Request $request){
        $current = current::find(1);
        $current->colour = $request->input('colour');
        $current->save();
    return redirect('/')->with('success', 'Colour saved successfully!');
}
    
}
