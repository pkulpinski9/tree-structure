<?php

namespace Database\Seeders;

use App\Models\Tree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$dL4JDnVr/8URS45wMmvrVuuHwYH72sZzpwS7gLMGqFWHnob4x2lwK', //adminadmin
            'is_admin' => 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => '$2y$10$dL4JDnVr/8URS45wMmvrVuuHwYH72sZzpwS7gLMGqFWHnob4x2lwK', //adminadmin
            'is_admin' => 0
        ]);

        Tree::create([
            'name' => 'Nowy root',
            'depth' => 0
        ]);
        Tree::create([
            'name' => 'Programowanie',
            'parent_id' => 1,
            'depth' => 1
        ]);
        Tree::create([
            'name' => 'Bazy danych',
            'parent_id' => 1,
            'depth' => 1
        ]);
        Tree::create([
            'name' => 'c++',
            'parent_id' => 2,
            'depth' => 2
        ]);
        Tree::create([
            'name' => 'java',
            'parent_id' => 2,
            'depth' => 2
        ]);
        Tree::create([
            'name' => 'php',
            'parent_id' => 2,
            'depth' => 2
        ]);
        Tree::create([
            'name' => 'MySQL',
            'parent_id' => 3,
            'depth' => 2
        ]);
        Tree::create([
            'name' => 'ClickHouse',
            'parent_id' => 3,
            'depth' => 2
        ]);
        Tree::create([
            'name' => 'Laravel',
            'parent_id' => 6,
            'depth' => 3
        ]);
        Tree::create([
            'name' => 'Symfony',
            'parent_id' => 6,
            'depth' => 3
        ]);

    }
}
