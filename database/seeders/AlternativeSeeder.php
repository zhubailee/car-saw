<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'car'   =>  [
                'Honda Brio',
                'Toyota Innova',
                'Honda Jazz',
                'Nissan Fortuner',
                'Mitsubishi Lancer'
            ],
            'description'   =>  [
                'cars manufactured by Honda',
                'cars manufactured by Toyota',
                'cars manufactured by Honda',
                'cars manufactured by Nissan',
                'cars manufactured by Mitsubishi',
            ]
        ];

        $alternative = new Alternative();
        foreach ($data['car'] as $key => $value) {
            $alternative->create([
                'car'           => $value,
                'description'   =>  $data['description'][$key]
            ]);
        }
    }
}
