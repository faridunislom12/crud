<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::insert([
                'name' => 'Администратор',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12341234'), // password
                'profile_photo_path' => 'photo',
            ]
        );


        \App\Models\Unit::factory(10)->create();

        \App\Models\Category::factory(10)->create();

        \App\Models\Product::factory(10)->create();

        \App\Models\Crude::factory(10)->create();

//        \App\Models\ProductCrude::factory(10)->create();

        \App\Models\Warehouse::factory(10)->create();

//        \App\Models\WarehouseProduct::factory(10)->create();

        \App\Models\Status::factory(10)->create();

        \App\Models\Order::factory(10)->create();

//        \App\Models\OrderProduct::factory(10)->create();

//        \App\Models\Role::factory(10)->create();

//        \App\Models\RoleUser::factory(10)->create();

//        \App\Models\Permission::factory(10)->create();

//        \App\Models\PermissionRole::factory(10)->create();

//        \App\Models\PermissionUser::factory(10)->create();

        $post = Category::create([
            "name"=> "Записи",
            "resource"=> "post",
            "is_active"=> 1
        ]);

        Category::create([
            "name"=> "Онас",
            "parent_id"=> $post->id,
            "resource"=> "about",
            "is_active"=> 1
        ]);

        Category::create([
            "name"=> "Кто носит нашу обувь",
            "parent_id"=> $post->id,
            "is_active"=> 1
        ]);

        Category::create([
            "name"=> "Наши магазины",
            "parent_id"=> $post->id,
            "is_active"=> 1
        ]);

        Category::create([
            "name"=> "СМИ",
            "parent_id"=> $post->id,
            "resource"=> "mass",
            "is_active"=> 1
        ]);

        $this->call(LaratrustSeeder::class);
    }
}
