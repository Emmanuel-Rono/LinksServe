<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Link::factory()->count(5)->create();
    }
}
