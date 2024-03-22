<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('categories', function ($collection) {
            $collection->index('category');
            $collection->timestamps();
        });

        // Populate the categories
        DB::connection('mongodb')->collection('categories')->insert([
            ['category' => 'frontend', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'backend', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'ui-ux', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'project-management', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('categories');
    }
}
