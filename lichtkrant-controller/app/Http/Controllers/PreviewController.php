<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Current;

class PreviewController extends Controller
{
    public static function previewText() {
        $text = Current::first()->value('text');
        return $text;
    }

    public static function previewColour() {
        $colour = Current::first()->value('colour');
        return '#' . $colour;
    }
}
