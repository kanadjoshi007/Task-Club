<?php

namespace App\Jobs;

use App\Models\Discount;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DiscountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $id;

    public function __construct($id)
    {

        $this->id = $id;

   
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        DB::table('discounts')->insert([[

            'product_id'=>$this->id,
            'code'=>'SUMMER',
            'percentage'=>10,
            'min_amount'=>100,
            'expiry_date'=>'2024-06-20 14:55:24',
            'status'=>'active',
        ],
        [

            'product_id'=>$this->id,
            'code'=>'WINTER',
            'percentage'=>15,
            'min_amount'=>200,
            'expiry_date'=>'2024-06-20 14:55:24',
            'status'=>'active',
        ],
        [

            'product_id'=>$this->id,
            'code'=>'MONSOON',
            'percentage'=>20,
            'min_amount'=>500,
            'expiry_date'=>'2024-06-20 14:55:24',
            'status'=>'active',
        ],
    
        ]        
    );

    }
}
