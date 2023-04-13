<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Current;
use Illuminate\Support\Facades\Auth;
use App\Models\TextPreset;



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

public function saveCurrentDataToTextPresets(Request $request)
{
    $current = DB::table('current')->first();
    $user_id = Auth::id();

    $id = $request->has('preset1') ? 1 : 2; // check which button was pressed

    if ($current) {
        $textPreset = DB::table('textPresets')
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->first();

        TextPreset::where('id', $id)->delete();

        if ($textPreset) {
            DB::table('textPresets')
                ->where('id', $id)
                ->where('user_id', $user_id)
                ->update([
                    'text' => $current->text,
                    'colour' => $current->colour
                ]);
        } else {
            DB::table('textPresets')->insert([
                'id' => $id,
                'text' => $current->text,
                'colour' => $current->colour,
                'user_id' => $user_id,
                'private' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/')->with('success', 'Data saved successfully!');
    } else {
        return redirect('/')->with('error', 'No data to save!');
    }
}

    
}
