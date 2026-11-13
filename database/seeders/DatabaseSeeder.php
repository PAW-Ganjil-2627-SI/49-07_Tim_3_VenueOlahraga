<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      User::create([
         'name'     => 'Admin Court 90',
         'email'    => 'admin@court90.com',
         'password' => Hash::make('password123'),
         'role'     => 'admin',
      ]);

      User::create([
         'name'     => 'Staff Court 90',
         'email'    => 'staff@court90.com',
         'password' => Hash::make('password123'),
         'role'     => 'staff',
      ]);
    }
}
