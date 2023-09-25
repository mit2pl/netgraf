<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::create([
            'id' => '1',
            'name' => 'name 1'
        ]);
        Tag::create([
            'id' => '2',
            'name' => 'name 2'
        ]);
        Tag::create([
            'id' => '3',
            'name' => 'name 3'
        ]);
        Tag::create([
            'id' => '4',
            'name' => 'name 4'
        ]);
        Tag::create([
            'id' => '5',
            'name' => 'name 5'
        ]);
        Tag::create([
            'id' => '6',
            'name' => 'name 6'
        ]);
        Tag::create([
            'id' => '7',
            'name' => 'name 7'
        ]);
        Tag::create([
            'id' => '8',
            'name' => 'name 8'
        ]);
    }
}
