<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['Egin-eşik', null, [
                ['Jempirler', null, 'Jempir', null],
                ['Köýnekler', null, 'Köýnek', null],
                ['Futbolkalar', null, 'Futbolka', null],
                ['Balaklar', null, 'Balak', null],
                ['Paltolar', null, 'Palto', null],
                ['Joraplar', null, 'Jorap', null],
            ]],
            ['Aýakgap', null, [
                ['Sport Aýakgaplar', null, 'Sport Aýakgap', null],
                ['Ädikler', null, 'Ädik', null],
                ['Şypbyklar', null, 'Şypbyk', null],
            ]],
            ['Aksesuar', null, [
                ['Sagatlar', null, 'Sagat', null],
                ['Äýnekler', null, 'Äýnek', null],
                ['Kemerler', null, 'Kemer', null],
                ['Gapjyklar', null, 'Gapjyk', null],
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $category = Category::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i][2]); $j++) {
                Category::create([
                    'parent_id' => $category->id,
                    'name_tm' => $objs[$i][2][$j][0],
                    'name_en' => $objs[$i][2][$j][1],
                    'product_name_tm' => $objs[$i][2][$j][2],
                    'product_name_en' => $objs[$i][2][$j][3],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
