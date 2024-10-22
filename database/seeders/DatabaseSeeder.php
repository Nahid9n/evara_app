<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\PrivacyPolicy;
use App\Models\PurchaseGuide;
use App\Models\ReturnPolicy;
use App\Models\ShippingPolicy;
use App\Models\TermsCondition;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(WebsiteSetting::class);
        $contact = ContactUs::find(1);
        if (!$contact){
            ContactUs::create([
                'id' => 1,
                'description' => 'Description',
            ]);
        }
        $about = AboutUs::find(1);
        if (!$about){
            AboutUs::create([
                'id' => 1,
                'description' => 'Description',
            ]);
        }






    }
}
