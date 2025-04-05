<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin'),
        ]);

        $admin->assignRole('admin');

        $editor = User::query()->create([
            'name' => 'Stella',
            'email' => 'stella@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('editoreditor'),
        ]);

        $editor->assignRole('editor');

        $user = User::query()->create([
            'name' => 'Mike',
            'email' => 'mike@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('useruser'),
        ]);

        $user->assignRole('user');
    }
}
