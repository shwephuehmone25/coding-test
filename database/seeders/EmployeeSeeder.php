<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company; // Import the Company model
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $companyIds = Company::pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'profile' => $faker->text(200), 
                'company_id' => $faker->randomElement($companyIds), 
            ]);
        }
    }
}
