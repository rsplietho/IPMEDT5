<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Current;
use Illuminate\Support\Facades\Auth;
use App\Models\TextPreset;



class DataController extends Controller
{
    public function getText() {
        $data = DB::table('current')->pluck('text')->implode(',');
        return $data;
    }
    
    public function getColour() {
        $data = DB::table('current')->pluck('colour')->implode(',');
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
    
        $id = 0;
    
        if ($request->has('preset1')) {
            $id = 1;
        } else if ($request->has('preset2')) {
            $id = 2;
        } else if ($request->has('preset3')) {
            $id = 3;
        } else if ($request->has('preset4')) {
            $id = 4;
        }
    
        TextPreset::where('id', $id)->delete();

        if ($id > 0) {
            if ($current) {
                $textPreset = DB::table('textPresets')
                    ->where('id', $id)
                    ->where('user_id', $user_id)
                    ->first();
    
                
    
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
        } else {
            return redirect('/')->with('error', 'Invalid request!');
        }
    }
    
    public function updateCurrent($id)
    {
        $preset = TextPreset::find($id);
        $current = Current::find(1);
        
        $current->text = $preset->text;
        $current->colour = $preset->colour;
        
        $current->save();
        
        return redirect('/')->with('success', 'Text and colour saved successfully!');
    }
    
    

    
}
