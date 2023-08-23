<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DumpUsersTableSeeder::class,
            DumpStudentsTableSeeder::class,
            DumpCompaniesTableSeeder::class,
            DumpOffersTableSeeder::class,
            DumpOfferStudentTableSeeder::class,
            DumpStudentPinsTableSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(DemoDumpCompaniesTableSeeder::class);
        $this->call(DemoDumpMediaTableSeeder::class);
        $this->call(DemoDumpOfferStudentTableSeeder::class);
        $this->call(DemoDumpOffersTableSeeder::class);
        $this->call(DemoDumpStudentPinsTableSeeder::class);
        $this->call(DemoDumpStudentsTableSeeder::class);
        $this->call(DemoDumpUsersTableSeeder::class);
    }
}
