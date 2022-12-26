<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            //
        })->afterCreating(function (Product $product) {
//            $product->save();
//
//            $attributes = Attribute::with('values')
//                ->orderBy('sort_order')
//                ->get();
//
//            $values = [];
//            foreach ($attributes as $attribute) {
//                $values[] = $attribute->values->random()->id;
//            }
//
//            $product->values()->sync($values);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::doesntHave('child')->inRandomOrder()->first();
        $brand = Brand::inRandomOrder()->first();

        $gender = fake()->boolean(90)
            ? Gender::inRandomOrder()->first() : null;

        $color = fake()->boolean(90)
            ? AttributeValue::where('attribute_id', 1)->inRandomOrder()->first() : null;

        $size = fake()->boolean(90)
            ? AttributeValue::where('attribute_id', 2)->inRandomOrder()->first() : null;

        $nameTm = fake()->streetSuffix();
        $nameEn = null;

        $fullNameTm = $brand->name . ' '
            . $nameTm . ' '
            . (isset($gender) ? $gender->name_tm . ' ' : '')
            . (isset($color) ? $color->name_tm . ' ' : '')
            . $category->product_name_tm
            . (isset($size) ? ', ' . $size->name_tm : '');
        $fullNameEn = $brand->name . ' '
            . ($nameEn ?: $nameTm) . ' '
            . (isset($gender) ? ($gender->name_en ?: $gender->name_tm) . ' ' : '')
            . (isset($color) ? ($color->name_en ?: $color->name_tm) . ' ' : '')
            . ($category->product_name_en ?: $category->product_name_tm)
            . (isset($size) ? ', ' . ($size->name_en ?: $size->name_tm) : '');

        $hasDiscount = fake()->boolean(20);

        return [
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'gender_id' => isset($gender) ? $gender->id : null,
            'color_id' => isset($color) ? $color->id : null,
            'size_id' => isset($size) ? $size->id : null,
            'code' => 'c' . $category->id
                . '-b' . $brand->id
                . (isset($gender) ? '-g' . $gender->id : '')
                . (isset($color) ? '-' . $color->id : ''),
            'name_tm' => $nameTm,
            'name_en' => $nameEn,
            'full_name_tm' => $fullNameTm,
            'full_name_en' => $fullNameEn,
            'barcode' => fake()->unique()->isbn13(),
            'price' => fake()->randomFloat($nbMaxDecimals = 1, $min = 100, $max = 1000),
            'stock' => rand(0, 10),
            'discount_percent' => $hasDiscount
                ? rand(10, 20) : 0,
            'discount_start' => $hasDiscount
                ? Carbon::today()
                    ->subDays(rand(1, 7))
                    ->subHours(rand(1, 24))
                    ->subMinutes(rand(1, 60))
                    ->toDateTimeString()
                : Carbon::today()
                    ->startOfMonth()
                    ->toDateTimeString(),
            'discount_end' => $hasDiscount
                ? Carbon::today()
                    ->addDays(rand(1, 7))
                    ->addHours(rand(1, 24))
                    ->addMinutes(rand(1, 60))
                    ->toDateTimeString()
                : Carbon::today()
                    ->startOfMonth()
                    ->toDateTimeString(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
