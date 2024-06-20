<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expiry {expiry_date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the expiry data of product';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
      
        foreach($this->argument('expiry_date') as $ex)
        {

            Log::info("product Expire  at : ",$ex);
        }

    }
}
