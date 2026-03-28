<?php

namespace Database\Seeders\Themes\Catholic;

use Illuminate\Database\Seeder;

class CatholicSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CatholicPostSeeder::class,
            CatholicForumSeeder::class,
            CatholicCommunitySeeder::class,
        ]);
    }
}
