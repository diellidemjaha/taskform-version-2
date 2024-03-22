<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

final readonly class CreateTask
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user=auth('sanctum')->user();
        // Check if the authenticated user has the 'admin' role
        // if (Auth::check() && Auth::user()->hasRole('admin')) {
            // If the user has 'admin' role, create the task
            $taskData = [
                'task_name' => $args['task_name'],
                'category' => $args['category'],
                'status' => $args['status'],
                'task_description' => $args['task_description'],
                'end_date' => $args['end_date'],
                'admin_id' => $user->id, 
            ];


            return Task::create($taskData);
        // } else {
            // If the user doesn't have 'admin' role, throw an error or handle it accordingly
            // throw new \Exception('Unauthorized. Only users with "admin" role can create tasks.');
        }
    // }
}
