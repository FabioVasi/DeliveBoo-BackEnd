<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;


use function Pest\Laravel\json;



class DishSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dishes = config('dishes');

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->user_id = '1';
            $new_dish->name = $dish['name'];
            $new_dish->img = $dish['img'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->available = $dish['available'];
            $new_dish->slug = Str::slug($new_dish->name, '-');
            $new_dish->save();
        }

        /* $ingredients = [
            'Rum',
            'Lime juice',
            'Sugar',
            'Mint',
            'Soda',
        ];
        for ($i = 0; $i < 10; $i++) {
            $dish = new Dish();
            $dish->user_id = '1';
            $dish->name = Str::random(10);
            $dish->description = Str::random(30);
            $dish->ingredients = implode(', ', $ingredients);
            $dish->price = 10;
            $dish->available = true;
            $dish->img = Str::random(10);
            $dish->slug = Str::slug($dish->name, '-');
            $dish->save();
        } */
    }
}
