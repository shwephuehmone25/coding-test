<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $defaultImage = 'img/favicon.png'; 
        
        $faker = Faker::create();

        foreach (range(1, 11) as $index) {
            Company::create([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'logo' => $faker->imageUrl(200, 200, 'business', true), 
                'website' => $faker->url,
            ]);
        }
    }
}
