<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use Carbon\Carbon;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionRecords = [
          ['id'=>1 ,   'name' => 'Electronics', 'status' => 1 , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now()] , 
          ['id'=>2 ,   'name' => 'Clothing', 'status' => 1 , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now()] , 
          ['id'=>3 ,   'name' => 'Appliances', 'status' => 1 , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now()] , 
        
        ];
        Section::insert($sectionRecords);
    }
}
