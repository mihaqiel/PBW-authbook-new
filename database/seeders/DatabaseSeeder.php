<?php
namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
      User::firstOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin User',
        'password' => bcrypt('password'),
        'email_verified_at' => now(),
    ]
);
        $authors = Author::factory(10)->create();

        Book::factory(50)->create([
            'author_id' => fn () => $authors->random()->id,
        ]);
    }
}
