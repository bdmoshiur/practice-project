<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 5 ; $i++) {
            DB::table('posts')->insert([
                'title' => "This is a first Title $i",
                'sdescription' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit $i",
                'ldescription' => "Explicabo aliquid quae earum culpa accusantium porro fuga obcaecati quos minima facilis! Vitae a numquam corporis ea repudiandae? $i",
            ]);
        }
    }
}

