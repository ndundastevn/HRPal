<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        // ]);
    //     \App\Models\Job::factory()
    //     ->create(
    //     [
    //         'name' => 'Finance',
    //         'reference' => 'RH2444/24',
    //         'deadline' => '31-12-2023',
    //         'vacancy' => '5',
    //         'position' => 'intern'
    //     ],
    // )

    // );
    }
}
