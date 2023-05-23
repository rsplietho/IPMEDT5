<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Current;

class QuoteController extends Controller
{
    /**
     * Pull a random quote from ZenQuotes.io API and return it in the format "Quote" -Author.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRandomQuote()
    {
        $response = Http::get('https://zenquotes.io/api/random');
        $quoteData = json_decode($response->getBody())[0];

        $quote = $quoteData->q;
        $author = $quoteData->a;


        $current = Current::find(1);        
        $current->text = "\"{$quote}\" -{$author}";
        $current->save();
        
        return redirect('/')->with('success', 'Text saved successfully!');
    }
}
