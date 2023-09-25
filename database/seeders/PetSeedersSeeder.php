<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeedersSeeder extends Seeder
{
    public function run(): void
    {
        Pet::create([
            'id' => '1',
            'category_id' => '1',
            'tag_id' => '1',
            'name' => 'pet 1',
            'photo_urls' => '',
            'status' => 'pending'
        ]);
        Pet::create([
            'id' => '2',
            'category_id' => '2',
            'tag_id' => '3',
            'name' => 'pet 2',
            'photo_urls' => '',
            'status' => 'sold'
        ]);
        Pet::create([
            'id' => '3',
            'category_id' => '1',
            'tag_id' => '2',
            'name' => 'pet 3',
            'photo_urls' => '',
            'status' => 'available'
        ]);
        Pet::create([
            'id' => '4',
            'category_id' => '4',
            'tag_id' => '4',
            'name' => 'pet 4',
            'photo_urls' => '',
            'status' => 'available'
        ]);
    }
}
