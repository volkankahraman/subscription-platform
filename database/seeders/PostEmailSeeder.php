<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostEmail;

class PostEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostEmail::factory(10)->create();
    }
}
