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
        foreach (Permissions::cases() as $case) {
            Permission::firstOrCreate(['name' => $case]);
        }
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
            Permissions::VIEW_ADS,
            Permissions::CREATE_ADS,
            Permissions::MANAGE_AD_TEMPLATES,
            Permissions::CREATE_AD_TEMPLATE_FROM_AD,
            Permissions::LINK_AD_TO_AD_TEMPLATE,
        ]);

        $viewer->givePermissionTo([
            Permissions::VIEW_DASHBOARD,
        ]);
        //endregion
    }
}
