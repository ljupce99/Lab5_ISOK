<?php

namespace Database\Seeders;

use App\Models\CategoryRecipe;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoryRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            CategoryRecipe::query()
                ->create([
                    'name' => $faker->unique(),

                ]);
        }
    }
}
