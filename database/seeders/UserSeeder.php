<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdministrator = User::factory()->createOne([
            'name' => 'luffy',
            'email' => 'illan709@hotmail.fr',
            'password' => Hash::make('123456789'),
        ]);

        $superAdministrator->assignRole('super administrator');

        $administrator = User::factory()->createOne([
            'name' => 'admin',
            'email' => 'admin@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $administrator->assignRole('administrator');

        $superModerator = User::factory()->createOne([
            'name' => 'super moderator',
            'email' => 'supmodo@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $superModerator->assignRole('super moderator');

        $moderator = User::factory()->createOne([
            'name' => 'moderator',
            'email' => 'modo@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $moderator->assignRole('moderator');

        $moderators = User::factory(5)->create();

        $moderators->map(function ($user) {
            $user->assignRole('moderator');
        });


        $user = User::factory()->createOne([
            'name' => 'user',
            'email' => 'user@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $user->assignRole('user');

        $userBanForum = User::factory()->createOne([
            'name' => 'user ban forum',
            'email' => 'userBanForum@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $userBanForum->assignRole('user');

        $userBanChat = User::factory()->createOne([
            'name' => 'user ban chat',
            'email' => 'userBanChat@outlook.fr',
            'password' => Hash::make('123456789'),
        ]);

        $userBanChat->assignRole('user');

        $users = User::factory(5)->create();

        $users->map(function ($user) {
            $user->assignRole('user');
        });
    }
}
