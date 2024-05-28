<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'id'=>1,
            'first_name' =>'Super',
            'last_name' =>'Admin',
            'email'     =>'admin@gmail.com',
            'password'  =>bcrypt('admin@gmail.com'),
            'gender'    =>'male',
            'date_of_birth'       =>'31-07-1998',
            'address'    =>'dhaka,Bangladesh',
            'phone'    =>'01310993183',
            // 'role'      => 'admin',
            // 'role_id'   => '1',
        ]);
    }
}
