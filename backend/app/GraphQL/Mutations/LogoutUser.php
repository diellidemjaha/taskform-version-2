<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class LogoutUser
{
    public function __invoke(null $_, array $args)
    {
        // Get the authenticated user
        $user = auth('sanctum')->user();

        // Check if the user is authenticated
        if ($user) {
            // Revoke all tokens for the authenticated user
            $user->tokens()->delete();

            // Return a success message
            return ['message' => 'Successfully logged out'];
        }

        // If the user is not authenticated, return an error message
        throw new \Exception('User is not authenticated');
    }
}
