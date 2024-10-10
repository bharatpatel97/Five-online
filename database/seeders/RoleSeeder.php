<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['admin access', 'admin edit', 'hr access', 'hr create', 'hr edit', 'hr delete', 'employee access', 'employee create', 'employee edit', 'employee delete', 'hr leave approve', 'employee leave approve', 'hr policy access', 'hr policy create', 'hr policy edit', 'hr policy delete', 'employee policy create', 'employee policy edit', 'employee policy delete', 'public holidays craete', 'public holidays edit', 'public holidays delete', 'hr leave application', 'employee leave application', 'employee policy access', 'public holidays access'];

        foreach($permissions as $perm)
        {
            Permission::create(['name' => $perm]);
        }

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo(Permission::all());

        $hr_role = Role::create(['name' => 'hr']);
        $hr_role->givePermissionTo(['hr access', 'employee access', 'employee create', 'employee edit', 'employee delete', 'employee leave approve', 'hr policy access', 'hr policy create', 'hr policy edit', 'hr policy delete', 'public holidays craete', 'public holidays edit', 'public holidays delete']);
        
        $employee_role = Role::create(['name' => 'employe']);
        $employee_role->givePermissionTo(['employee access', 'employee leave application', 'employee policy access', 'public holidays access']);

        $admin = User::create([
            'name'     => 'Bhavesh Patel',
            'email'    => 'bhavesh@gmail.com',
            'password' => 'bhavesh@12345'
        ]);

        $admin->assignRole($admin_role);

        $hr = User::create([
            'name'     => 'Mehul Patel',
            'email'    => 'mehul@gmail.com',
            'password' => 'mehul@12345'
        ]);

        $hr->assignRole($hr_role);

        $employee = User::create([
            'name'     =>'Ravi Patel',
            'email'    =>'ravi@gmail.com',
            'password' => 'ravi@12345'
        ]);

        $employee->assignRole($employee_role); 
    }
}
