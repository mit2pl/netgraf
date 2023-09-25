<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
        'id' => '1',
        'name' => 'name 1'
        ]);
        Category::create([
            'id' => '2',
            'name' => 'name 2'
        ]);
        Category::create([
            'id' => '3',
            'name' => 'name 3'
        ]);
        Category::create([
            'id' => '4',
            'name' => 'name 4'
        ]);
        Category::create([
            'id' => '5',
            'name' => 'name 5'
        ]);
        Category::create([
            'id' => '6',
            'name' => 'name 6'
        ]);
        Category::create([
            'id' => '7',
            'name' => 'name 7'
        ]);
        Category::create([
            'id' => '8',
            'name' => 'name 8'
        ]);
        Category::create([
            'id' => '9',
            'name' => 'name 9'
        ]);
        Category::create([
            'id' => '10',
            'name' => 'name 10'
        ]);
    }
}
