<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminsRecords = [
            ['id' => 2 , 'name' => 'John' , 'type' => 'vendor' , 'vendor_id' => 1 , 
            'mobile' => '9800000000' , 'email' => 'john@gmail.com' , 
            'password' => '$2y$10$gazn9y6GpfP9gTZUDDcgVO6Nr8OzBGkl2nzXtwTWZZnCQ6Y9AUHCq' , 'image' => '',  'status' => 0]
        ];

        Admin::insert($adminsRecords);
    }
}
