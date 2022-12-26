<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['Aşgabat', 15],
            ['Ahal welaýaty', 30],
            ['Balkan welaýaty', 40],
            ['Daşoguz welaýaty', 50],
            ['Lebap welaýaty', 50],
            ['Mary welaýaty', 30],
        ];

        foreach ($objs as $obj) {
            Location::create([
                'name_tm' => $obj[0],
                'delivery_fee' => $obj[1],
            ]);
        }
    }
}
