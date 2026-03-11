<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Institucional',
            'Cultura',
            'Investigación',
            'Comunidad',
        ];

        foreach ($categories as $category) {
            NewsCategory::firstOrCreate(
                ['slug' => Str::slug($category)],
                ['name' => $category]
            );
        }
    }
}
