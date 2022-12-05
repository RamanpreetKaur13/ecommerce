<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id' => 1 , 'name' => 'john' , 'address' => 'cp-112' , 'city' => 'New delhi' , 'state' => 'Delhi' ,
             'country' => 'India' , 'pincode' => 142201 , 'mobile' => 1234567899 , 'email' => 'john@gmail.com' , 'status' => 0] 
        ];
        Vendor::insert($vendorRecords);
    }
}
