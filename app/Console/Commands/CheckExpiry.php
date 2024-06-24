<?php

namespace App\Console\Commands;

use DateTime;
use App\Models\Discount;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
      
        // foreach($this->argument('expiry_date') as $ex)
        // {

            // $expiry = Discount::all()->pluck('expiry_date');
            
        
          
                $currentDate = Carbon::parse(now())->format('Y-m-d'); 
            
                Discount::where('expiry_date','LIKE',$currentDate.'%')->update(['status'=>'inactive']);
                
                Log::info('executed');
                
                // if($time ==  $exp){

                //     $data = Discount::whereDate('expiry_date','=',$date)->get()->first();
                    
                       
                //     $data->update(['status'=>'inactive']);

                // }  

            // }


        // }

    }
}
