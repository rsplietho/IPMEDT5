<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Weather;
use App\Models\Current;

class updateWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the weather from the DB and display it.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current = Current::first();
        if ($current->mode != 3) {
            return;
        }

        $weather = Weather::find(1);
        $temperature = $weather->temperature;
        $humidity = $weather->humidity;

        $current = Current::find(1);        
        $current->text = "Temperatuur: {$temperature}°C - Luchtvochtigheid: {$humidity}%";
        $current->save();

        $this->info('Weather updated successfully.');

    }
}
