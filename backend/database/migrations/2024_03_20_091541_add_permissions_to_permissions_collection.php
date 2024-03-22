<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Permission;

class AddPermissionsToPermissionsCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     // Insert permissions for reading, creating, updating, and deleting tasks into the permissions collection
     DB::collection('permissions')->insert([
        ['name' => 'read tasks', 'guard_name' => 'web'],
        ['name' => 'create tasks', 'guard_name' => 'web'],
        ['name' => 'update tasks', 'guard_name' => 'web'],
        ['name' => 'delete tasks', 'guard_name' => 'web'],
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::collection('permissions')->whereIn('name', ['read tasks', 'create tasks', 'update tasks', 'delete tasks'])->delete();
    }
}
