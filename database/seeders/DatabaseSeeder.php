<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder
 * Seeds the database with initial data for testing and development
 */
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * Creates default admin and user accounts
     */
    public function run(): void
    {
        // Uncomment to create 10 random users
        // User::factory(10)->create();

        // Create default admin user
        User::factory()->create([
            'name' => 'admin',
            'email' => 'v@v.com',
            'password' => 'v',
            'role' => 'admin',
        ]);

        // Create default regular user
        User::factory()->create([
            'name' => 'user',
            'email' => 's@s.com',
            'password' => 's',
        ]);

        // Uncomment to call additional seeders
        // $this->call([
        //     ProductSeeder::class,
        // ]);

    }
}
