<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;


class WebsiteSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'id'=>1,
            'company_name' =>'company_name',
            'slogan' =>'slogan',
        ]);
        User::create([
            'id'=>1,
            'name' =>'Super Admin',
            'email' =>'admin@gmail.com',
            'password' =>'admin@gmail.com',
        ]);

    }
}
