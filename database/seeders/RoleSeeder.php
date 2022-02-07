<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::create(['name' => 'super administrator']);
        $adminRole = Role::create(['name' => 'administrator']);
        $superModeratorRole = Role::create(['name' => 'super moderator']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $userRole = Role::create(['name' => 'user']);
        $userBanForumRole = Role::create(['name' => 'user ban forum']);
        $userBanChatRole = Role::create(['name' => 'user ban chat']);
        $userBanRole = Role::create(['name' => 'user ban']);

        $banAdministratorPermission = Permission::create(['name' => 'ban administrator']);
        $banSuperModeratorPermission = Permission::create(['name' => 'ban super moderator']);
        $banModeratorPermission = Permission::create(['name' => 'ban moderator']);
        $banPermission = Permission::create(['name' => 'ban user']);
        $manageForumPermission = Permission::create(['name' => 'manage forum']);
        $assignAdminPermission = Permission::create(['name' => 'assign administrator role']);
        $assignSuperModeratorPermission = Permission::create(['name' => 'assign super moderator role']);
        $assignModeratorPermission = Permission::create(['name' => 'assign moderator role']);
        $seeForumPermission = Permission::create(['name' => 'see forum']);
        $seeChatPermission = Permission::create(['name' => 'see chat']);
        $writeForumPermission = Permission::create(['name' => 'write forum']);
        $writeChatPermission = Permission::create(['name' => 'write chat']);

        $superAdminRole->syncPermissions(Permission::all());

        $adminRole->syncPermissions([
            $banSuperModeratorPermission,
            $banModeratorPermission,
            $banPermission,
            $manageForumPermission,
            $assignAdminPermission,
            $assignSuperModeratorPermission,
            $assignModeratorPermission,
            $seeForumPermission,
            $seeChatPermission,
        ]);

        $superModeratorRole->syncPermissions([
            $banModeratorPermission,
            $banPermission,
            $seeForumPermission,
            $seeChatPermission,
            $writeForumPermission,
            $writeChatPermission,
        ]);

        $moderatorRole->syncPermissions([
            $banPermission,
            $seeForumPermission,
            $seeChatPermission,
            $writeForumPermission,
            $writeChatPermission,
        ]);

        $userRole->syncPermissions([
            $seeForumPermission,
            $seeChatPermission,
            $writeForumPermission,
            $writeChatPermission,
        ]);

        $userBanForumRole->syncPermissions([
            $seeChatPermission,
            $writeChatPermission,
        ]);

        $userBanChatRole->syncPermissions([
            $seeForumPermission,
            $writeForumPermission,
        ]);
    }
}
