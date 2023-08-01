<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients= [
            [
                'fname' => 'Kyth',
                'lname' => 'Gonzales',
                'address' => 'Tagbilaran City, Bohol',
                'email' => 'astutewanderer@gmail.com',
                'phone' => fake()->e164PhoneNumber,
                'initial_loan' => 20000,
                'issuance_date' => '2023-07-27',
            ],
            [
                'fname' => 'Robert',
                'lname' => 'Reid',
                'address' => 'Los Angeles, California',
                'email' => 'robertjreid27@gmail.com',
                'phone' => fake()->e164PhoneNumber,
                'initial_loan' => 45000,
                'issuance_date' => '2023-07-29',
            ],
            [
                'fname' => 'Louise Demean',
                'lname' => 'Balili',
                'address' => 'Ilijan Norte, Tubigon',
                'email' => 'balililouisedemean@gmail.com',
                'phone' => fake()->e164PhoneNumber,
                'initial_loan' => 30000,
                'issuance_date' => '2023-07-23',
            ],
        ];

        foreach($clients as $c) {
            Client::create($c);
        }
    }
}
