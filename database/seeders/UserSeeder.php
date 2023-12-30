<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Type;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = config('restaurants');

        foreach ($users as $user) {
            $new_user = new User();
            /* $types = Type::all()->take(rand(1, 20))->pluck('id');
            $new_user->types()->attach($types); */
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->p_iva = $user['p_iva'];
            $new_user->address = $user['address'];

            //$new_user->img = file_get_contents($user->img);
            $new_user->img = $user['img'];

            $new_user->slug = Str::slug($user['name'], '-');
            /* $new_user->types =  $user['types']; */
            $new_user->save();
        }

        /* for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->name =  Str::random(10);
            $user->email =  Str::random(10) . '@gmail.com';
            $user->password = Hash::make('password');
            $user->p_iva = Str::random(16);
            $user->address = Str::random(20);
            $user->slug = Str::slug($user->name, '-');
            $user->save();
        } */
    }
}
