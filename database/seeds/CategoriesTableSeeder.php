<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([ //,
                'name' => $faker->name,
                'parent_id' => $faker->randomDigit,

            ]);
        }
    }
}
