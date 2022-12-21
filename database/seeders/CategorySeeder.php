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
            ['Oýun üçin', 'For game', [
                ['Oyun Monitorlar', 'Gaming Monitors', 'Oyun monitor', 'Gaming monitor'],
                ['Oyun Klawiaturalar', 'Gaming Keyboards', 'Oyun klawiatura', 'Gaming keyboard'],
                ['Oyun Syçanjyklar', 'Gaming Mouses', 'Oyun syçanjyk', 'Gaming mouse'],
                ['Oyun Noutbuklar', 'Gaming Notebooks', 'Oyun noutbuk', 'Gaming notebook'],
                ['Kompýuter Kreslolary', 'Computer Chairs', 'Kompýuter kreslo', 'Computer chair'],
            ]],
            ['Iş üçin', 'For work', [
                ['Monitorlar', 'Monitors', 'Monitor', 'Monitor'],
                ['Klawiaturalar', 'Keyboards', 'Klawiatura', 'Keyboard'],
                ['Syçanjyklar', 'Mouses', 'Syçanjyk', 'Mouse'],
                ['Noutbuklar', 'Notebooks', 'Noutbuk', 'Notebook'],
                ['Printerler', 'Printers', 'Printer', 'Printer'],
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
                    'name_tm' => $objs[$i][$j][0],
                    'name_en' => $objs[$i][$j][1],
                    'product_name_tm' => $objs[$i][$j][0],
                    'product_name_en' => $objs[$i][$j][1],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
