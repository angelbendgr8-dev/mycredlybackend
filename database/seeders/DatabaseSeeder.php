<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\WalletCategory::create([
            'name' => 'Fiat',
        ]);
        \App\Models\WalletCategory::create([
            'name' => 'Crypto',
        ]);
        \App\Models\User::create([
            'first_name' => 'Mycredly',
            'last_name' => 'Admin',
            'username' => 'SuperAdmin',
            'mobile_number' => '08100000000',
            'country' => 'Nigeria',
            'code' => '234',
            'email' => 'admin@mycredly.com',
            'password' => Hash::make('password'),
            'type' => 1
        ]);
    }
}
