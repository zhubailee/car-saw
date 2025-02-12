<?php

namespace Database\Seeders;

use App\Models\Subcriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'idcriteria'        =>  [
                1,1,1,2,2,2,3,3,3,4,4,4,5,5,5
            ],
            'subcriteria_name'  =>  [
                'Cheap',
                'Medium',
                'Expensive',
                'Good',
                'Avarage',
                'Bad',
                'Confortable',
                'Moderate',
                'Unconfortable',
                'Economical',
                'Moderate',
                'Wasteful',
                'High',
                'Medium',
                'Low',
            ],
            'info'  =>  [
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
            ],
            'value' =>  [
                0.5,
                0.3,
                0.2,
                0.5,
                0.3,
                0.2,
                0.5,
                0.3,
                0.2,
                0.5,
                0.3,
                0.2,
                0.5,
                0.3,
                0.2,
            ]
        ];
        $subcriteria = new Subcriteria();
        foreach ($data['idcriteria'] as $key => $value) {
            $subcriteria->create([
                'idCriteria'        =>  $value,
                'subcriteria_name'  =>  $data['subcriteria_name'][$key],
                'info'              =>  $data['info'][$key],
                'value'             =>  $data['value'][$key],
            ]);
        }
    }
}
