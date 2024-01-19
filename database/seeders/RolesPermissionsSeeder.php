<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Enterprises\UserEnterprise;
use \App\Models\User;
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardNames = [ 'super-admin','user-reservation','user-levels'];

        // Guard names and their roles
        $guardsWithRoles = [
            'super-admin' => ['dashboard', 'services','reservations', 'buildings', 'levels', 'seasons', 'statuses','users'],
            'user-reservation' => ['dashboard', 'services', 'buildings', 'seasons', 'statuses'],
            'user-levels' => ['levels'],

        ];

        foreach ($guardNames as $key => $guardName) {
            $existingRecord = DB::table('user_levels')
                ->where('guard_name', $guardName)
                ->first();
        
            if (!$existingRecord) {
                DB::table('user_levels')->insert([
                    'guard_name' => $guardName,
                    'is_default' => 1,
                ]);
            }
        }
        // Permissions
        $masterPermissions = ['create', 'view', 'update', 'delete'];

        foreach ($guardsWithRoles as $guardName => $roles) {
            
            foreach ($roles as $roleName) {
                // Create role for each guard
                $role = Role::findOrCreate($roleName, $guardName);

               $role->save();
                // Assign permissions to roles
                foreach ($masterPermissions as $permissionName) {
                    $fullPermissionName = $roleName . '-' . $permissionName;
                    $permission = Permission::findOrCreate($fullPermissionName, $guardName);
                    
                    $permission->save();

                    $role->givePermissionTo($permission);
                }
            }
        }

        
    }
}
