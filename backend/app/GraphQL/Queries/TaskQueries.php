<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\Task;

final readonly class TaskQueries
{
    /** @param  array{}  $args */
    public function __invoke($_, $args)
    {
        try {
            // Fetch tasks from the Task model
            $tasks = Task::all();

            // Return the tasks
            return $tasks;
        } catch (\Exception $e) {
            // Handle any exceptions and return an error message
            return [
                'error' => $e->getMessage()
            ];
        }
    }
}
