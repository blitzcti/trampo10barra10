<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin',
            'friendlyName' => 'Administrador',
            'description' => 'Administra o sistema (root)'
        ]);

        $permissions = Permission::where('name', 'like', 'role-%')
            ->orWhere('name', 'like', 'user-%')
            ->orWhere('name', 'like', 'systemConfiguration-%')
            ->orWhere('name', 'like', 'course-%')
            ->orWhere('name', 'like', 'courseConfiguration-%')
            ->get();
        $role->syncPermissions($permissions);

        $role = Role::create([
            'name' => 'teacher',
            'friendlyName' => 'Professor',
            'description' => 'Professor de uma disciplina técnica'
        ]);

        $permissions = Permission::where('name', 'like', 'company-%')
            ->orWhere('name', 'like', 'companySector-%')
            ->get();
        $role->syncPermissions($permissions);
    }
}
