<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Current;
use DateTime;
use Carbon\Carbon;

class getTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current = Current::first();
        if ($current->mode != 4) {
            return;
        }

        $now = Carbon::now('Europe/Amsterdam');

        $current = Current::find(1);        
        $current->text = $now->format('d-m-Y - H:i');;
        $current->save();

        $this->info('Time saved successfully.');
    }
    

}
