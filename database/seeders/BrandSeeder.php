<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            'Adidas',
            'Puma',
            'Nike',
            'Defacto',
            'Koton',
            'U.S. Polo Assn.',
            'Pierre Cardin',
            'Daniel Klein',
            'Lacoste',
            'Hugo Boss',
            'Zara',
            'KEMAL TANCA',
            'Levi\'s',
            'Tommy Hilfiger',
            'Lotto',
            'New Balance',
            'Ltb',
            'Mavi',
            'Kiğılı',
            'Jack & Jones',
            'D\'S Damat',
            'Reebok',
            'Loft',
            'Columbia',
        ];
        foreach ($objs as $obj) {
            Brand::create([
                'name' => $obj,
            ]);
        }
    }
}
