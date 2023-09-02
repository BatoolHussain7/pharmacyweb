<?php

namespace App\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use App\Models\MonthProfit;
use App\Models\Bill;
use Carbon\Carbon;
use App\Models\admin;

class GetProfitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-profit-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get profit every month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admins = Admin::all();
        $currentDate = Carbon::now();
        $month = $currentDate->format('m');
        foreach ($admins as $admin) {
            $month_profit = MonthProfit::where('admin_id', $admin->id)->latest('updated_at')->first();
            $profit_generated_month = Bill::where('admin_id', $admin->id)
                ->whereMonth('created_at', $month)
                ->sum('profit_generated');
            if (!$month_profit) {
                $month_profit = new MonthProfit;
                $month_profit->admin_id = $admin->id;
                $month_profit->profit_list = json_encode(array_fill(0, $month - 1, 0));
                $month_profit->save();
            }
        }
        foreach ($admins as $admin) {
            $month_profit = MonthProfit::where('admin_id', $admin->id)->latest('updated_at')->first();
            $profit_generated_month = Bill::where('admin_id', $admin->id)
                ->whereMonth('created_at', $month)
                ->sum('profit_generated');
            //return response()->json([$profit_generated_month]);
            $profit_list =  json_decode($month_profit->profit_list);
            if ($month_profit) {
                if (count($profit_list) < 12) {
                    $profit_list[] = $profit_generated_month;
                    $profit_list = Arr::flatten($profit_list);
                    $month_profit->profit_list = json_encode($profit_list);
                    $month_profit->save();
                    //return response()->json([count($profit_list)]);
                } else {
                    $month_profit = new MonthProfit;
                    $month_profit->admin_id = $admin->id;
                    $month_profit->profit_list = json_encode(array_fill(0, 1, $profit_generated_month));
                    $month_profit->save();
                }
            }
        }
    }
}


///////////----------------------------------- Redeemer->? ----------------------------------////////////