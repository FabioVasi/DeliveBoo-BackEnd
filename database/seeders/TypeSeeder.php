<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = ['Cafe', 'Chinese', 'Japanese', 'Indian', 'International', 'Italian', 'Mexican', 'Bakery', 'Fish', 'Pizzeria', 'Fast food', 'Vegetarian', 'Vegan', 'French', 'Greek', 'Brazilian', 'Korean', 'Thai', 'Steakhouse', 'Burgers'];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($new_type->name, '-');
            $new_type->save();
        }
    }
}
