<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();

        Post::factory()->count(40)
            ->sequence(fn () => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn () => ['author_id' => $authors->random()->id])
            ->create();

        $kagawad = $authors->firstWhere('email', 'kagawad.casia@bulletin.test');

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Casia Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Residents are invited to join our community clean-up drive around Purok Casia.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-10-13 08:00:00',
            'views' => 0,
        ]);
    }
}
