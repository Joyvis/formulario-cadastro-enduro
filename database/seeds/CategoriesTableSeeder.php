<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sênior',
        ]);

        DB::table('categories')->insert([
            'name' => 'Over',
        ]);

        DB::table('categories')->insert([
            'name' => 'Novato',
        ]);

        DB::table('categories')->insert([
            'name' => 'Rally',
        ]);

        DB::table('categories')->insert([
            'name' => 'Duplas',
        ]);

    }
}
