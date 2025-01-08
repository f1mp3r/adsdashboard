<?php

namespace Database\Seeders;

use App\Enums\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //region Permissions
        Permission::firstOrCreate(['name' => Permissions::VIEW_DASHBOARD]);
        Permission::firstOrCreate(['name' => Permissions::MANAGE_ADS]);
        Permission::firstOrCreate(['name' => Permissions::MANAGE_AD_TEMPLATES]);
        Permission::firstOrCreate(['name' => Permissions::MANAGE_ROLES]);
        //endregion

        //region Roles
        Role::firstOrCreate(['name' => 'Super Admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $viewer = Role::firstOrCreate(['name' => 'Viewer']);
        //endregion

        //region Assign Permissions
        $admin->givePermissionTo([
            Permissions::VIEW_DASHBOARD,
            Permissions::MANAGE_ADS,
            Permissions::MANAGE_AD_TEMPLATES,
            Permissions::MANAGE_ROLES,
        ]);

        $editor->givePermissionTo([
            Permissions::VIEW_DASHBOARD,
            Permissions::MANAGE_ADS,
            Permissions::MANAGE_AD_TEMPLATES,
        ]);

        $viewer->givePermissionTo([
            Permissions::VIEW_DASHBOARD,
        ]);
        //endregion
    }
}
