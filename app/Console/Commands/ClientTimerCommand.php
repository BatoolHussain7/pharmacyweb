<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\FavoriteProduct;

class ClientTimerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:client-timer-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()                     ///////////////////////////////////////ddont punish up!
    {
        $favorits = FavoriteProduct::all();
        foreach ($favorits as $favorite) {
            if ($favorite->timer_condition == 'always') {
                if ($favorite->timer_status == false) {
                    $favorite->timer2 = $favorite->timer2 - 1;
                    $favorite->save();
                }
                if ($favorite->timer2 == 0) {
                    $favorite->timer2 = $favorite->timer;
                    $favorite->timer_status = true;
                    $favorite->save();
                }
            }
        }
    }
}


///////////----------------------------------- Redeemer->? ----------------------------------////////////