<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;

final readonly class RegisterUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::create([
            'username' => $args['username'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']), 
            'role' => $args['role'],
            'profile_picture' => $args['profile_picture'],
        ]);

        // Return the created user
        return $user;
    }
}
