<?php

namespace App\Console;

use App\Models\Discount;
use App\Models\Products;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->call(function(){
        //     $today = Carbon::now()->format('yy-m-d');
        //     $count = Discount::whereDate('expiry_date', $today)->get()->count();
        //     Log::channel('data_channel')->info("Product : ".$count);
        // })
        // ->dailyAt('00:01');
        

        $schedule->command("app:check-expiry")->everySecond()->sendOutputTo(storage_path('/logs/laravel.log'));
        

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
