<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);

        // Create roles if they don't exist
        $this->createRoleIfNotExists('Admin');
        $this->createRoleIfNotExists('Teacher');
        $this->createRoleIfNotExists('Parent');
        $this->createRoleIfNotExists('Student');

        // Assign permissions to roles if needed
        // $role->givePermissionTo('edit articles');
    }

    private function createRoleIfNotExists(string $roleName, string $guardName = 'web')
    {
        if (!Role::where('name', $roleName)->where('guard_name', $guardName)->exists()) {
            Role::create(['name' => $roleName, 'guard_name' => $guardName]);
        }
}

}