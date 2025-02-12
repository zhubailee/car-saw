<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'criteria_name' => [
                'Price',
                'Performance',
                'Comfort',
                'Fuel Consumption',
                'Safety'
            ],
            'type'  =>  [
                'cost',
                'benefit',
                'benefit',
                'benefit',
                'benefit',
            ],
            'weight'    =>  [
                0.25,
                0.2,
                0.2,
                0.15,
                0.2
            ]
        ];
        $criteria = new Criteria();
        foreach ($data['criteria_name'] as $key => $value) {
            $criteria->create([
                'criteria_name' =>  $value,
                'type'          =>  $data['type'][$key],
                'weight'        =>  $data['weight'][$key]
            ]);
        }
    }
}
