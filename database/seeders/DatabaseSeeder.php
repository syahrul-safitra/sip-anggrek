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
        // \App\Models\User::factory(10)->create();

        \App\Models\Jadwal::create([
            'hari' => "jum'at", 
            'jam' => '08:30 - 15:00',
            'status_libur' => false 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Sabtu", 
            'jam' => '08:30 - 15:00',
            'status_libur' => true 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Minggu", 
            'jam' => '08:30 - 15:00',
            'status_libur' => true 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Senin", 
            'jam' => '08:30 - 15:00',
            'status_libur' => false 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Selasa", 
            'jam' => '08:30 - 15:00',
            'status_libur' => false 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Rabu", 
            'jam' => '08:30 - 15:00',
            'status_libur' => false 
        ]);

        \App\Models\Jadwal::create([
            'hari' => "Kamis", 
            'jam' => '08:30 - 15:00',
            'status_libur' => false 
        ]);

        \App\Models\User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com', 
            'password' => 'password'
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
