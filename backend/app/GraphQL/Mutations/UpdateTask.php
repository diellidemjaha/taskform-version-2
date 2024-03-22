<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Task;

final readonly class UpdateTask
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $task = Task::findOrFail($args['id']);
        $task->update($args['input']);
        return $task;
    }
}
