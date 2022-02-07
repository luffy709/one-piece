<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        if (config('app.env') === 'local') {
            $this->call(UserSeeder::class);
            $this->call(ForumCategorySeeder::class);
            $this->call(RoomSeeder::class);
        }
    }
}
