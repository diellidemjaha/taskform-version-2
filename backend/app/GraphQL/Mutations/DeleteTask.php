<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\DB;

final readonly class DeleteTask
{
    /** @param  array{}  $args */
    public function __invoke($_, array $args)
    {
        try {
            DB::collection('tasks')->where('_id', $args['id'])->delete();
            return ['message' => 'Task deleted successfully'];
        } catch (\Exception $e) {
            // Handle any potential errors here
            return ['message' => 'Failed to delete task'];
        }
    }
}
