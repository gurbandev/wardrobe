<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['Erkek', 'Male'],
            ['Aýal', 'Female'],
        ];

        foreach ($objs as $obj) {
            Gender::create([
                'name_tm' => $obj[0],
                'name_en' => $obj[1],
            ]);
        }
    }
}
