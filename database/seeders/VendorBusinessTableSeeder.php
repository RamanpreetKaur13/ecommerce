<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorBusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venodrBusinessRecords = [
            ['id' => 1 , 'vendor_id' => 1 , 'shop_name' => 'john electronics store' , 'shop_address' => '1234' , 
             'shop_city' => 'moga' , 'shop_state' => 'punjab' , 'shop_country' => 'india' ,
                'shop_pincode' => '142001' , 'shop_mobile' => '1234567891' , 'shop_website' => '' , 
              'shop_email' => 'johnelectronic@gmail.com' , 'address_proof' => 'aadhar card' ,'address_proof_image' => 'test.jpg' ,
              'business_licence_number' => '12345678' , 'gst_number' => '12345678' , 'pan_number' => '12345678'] 
        ];
        VendorsBusinessDetail::insert($venodrBusinessRecords);

    }
}
