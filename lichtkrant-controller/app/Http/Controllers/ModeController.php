<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Current;
use Artisan;

class ModeController extends Controller
{
    public function setMode(Request $request)
    {
        $mode = $request->input('mode');

        $current = Current::find(1);        
        $current->mode = $mode;
        $current->save();

        $this->executeMode($mode);

        return redirect('/')->with('Success', 'Mode saved successfully!');
    }

    public function manualMode() {
        $current = Current::find(1);        
        $current->mode = 1;
        $current->save();
    }

    private function executeMode($mode) {
        switch ($mode) {
            case 1:
                $current = current::find(1);
                $current->text = "Geen tekst ingesteld";
                $current->save();
                break;
            case 2:
                Artisan::call('get:quote');
                break;
            case 3:
                Artisan::call('update:weather');
                break;
            case 4:
                Artisan::call('get:time');
                break;
        }
    }
}
