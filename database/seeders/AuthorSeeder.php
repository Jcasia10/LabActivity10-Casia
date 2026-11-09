<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Julianne Marie Casia',
            'position' => 'Kagawad',
            'email' => 'kagawad.casia@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}
