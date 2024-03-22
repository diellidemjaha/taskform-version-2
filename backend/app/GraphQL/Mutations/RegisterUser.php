<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

final readonly class RegisterUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::create([
            'username' => $args['username'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'profile_picture' => $args['profile_picture'],
        ]);

        // Find or create the role
        $role = Role::findOrCreate($args['role']);

        // Create the permission name based on the role
        $permissionName = $args['role'] === 'admin' ? 'create tasks' : 'read tasks';

        // Find or create the permission
        $permission = Permission::findOrCreate(['name' => $permissionName]);

        // Assign the permission to the role
        $role->givePermissionTo($permission);

        // Assign the role to the user
        $user->assignRole($role);

        return $user;
    }
}
