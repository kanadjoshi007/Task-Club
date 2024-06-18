<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'id'=>1,
            'group_id'=>3,
            'business_name'=>'Textile',
            'club_number'=>'200002026',
            'club_name'=>'Shirt',
            'club_state'=>'stable',
            'club_description'=>'Expansive',
            'club_slug'=>'asdfasdf',
            'website_title'=>'hello world',
            'website_link'=>'https://helloworld.com	',
            'club_logo'=>'HELLO',
            'group_id'=>'HELLO WORLD',
        ];

        DB::table('clubs')->insert($data);

    }
}
