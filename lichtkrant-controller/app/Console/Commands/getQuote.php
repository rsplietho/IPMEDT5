<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Current;

class getQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:quote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a random quote and display it';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current = Current::first();
        if ($current->mode != 2) {
            return;
        }

        $response = Http::get('https://zenquotes.io/api/random');
        $quoteData = json_decode($response->getBody())[0];

        $quote = $quoteData->q;
        $author = $quoteData->a;


        $current = Current::find(1);        
        $current->text = "\"{$quote}\" -{$author}";
        $current->save();

        $this->info('Quote saved successfully.');
    }
}
