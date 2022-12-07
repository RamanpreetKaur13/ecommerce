<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venodrBankRecords = [
            ['id' => 1 , 'vendor_id' => 1 , 'account_holder_name' => 'john singh' , 'bank_name' => 'ICICI' , 
             'account_number' => '12345678' , 'bank_ifsc_code' => '12345678' ] 
        ];
        VendorsBankDetail::insert($venodrBankRecords);
    }
}
