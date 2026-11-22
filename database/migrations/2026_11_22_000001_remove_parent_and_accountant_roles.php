<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RemoveParentAndAccountantRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Delete user accounts belonging to parent or accountant
        DB::table('users')->whereIn('user_type', ['parent', 'accountant'])->delete();

        // 2. Delete user types for parent and accountant
        DB::table('user_types')->whereIn('title', ['parent', 'accountant'])->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user_types')->insertOrIgnore([
            ['title' => 'accountant', 'name' => 'Accountant', 'level' => 5],
            ['title' => 'parent', 'name' => 'Parent', 'level' => 4],
        ]);
    }
}
