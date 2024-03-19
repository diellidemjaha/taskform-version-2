<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



final readonly class LoginUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        {
            // Validate input
            $validator = Validator::make($args, [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
    
            // Throw validation exception if validation fails
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
    
            // Attempt to authenticate user
            if (Auth::attempt($args)) {
                // Authentication successful
                $user = auth('sanctum')->user();
                $token = $user->createToken('auth-token')->plainTextToken;
    
                return [
                    'token' => $token,
                    'user' => $user,
                ];
            }
    
            // Authentication failed
            throw new \Exception('Invalid credentials');
        }
    }
}
