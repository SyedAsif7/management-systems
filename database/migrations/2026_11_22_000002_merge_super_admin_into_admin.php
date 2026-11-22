<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MergeSuperAdminIntoAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Delete all duplicate/extra admins (admin1, admin2, admin3, etc.)
        DB::table('users')->where('username', 'LIKE', 'admin%')->where('username', '!=', 'admin')->delete();

        // 2. Find and consolidate into a single primary admin account
        $adminUser = DB::table('users')->where('username', 'admin')->orWhere('email', 'admin@admin.com')->first();
        $cjUser = DB::table('users')->where('username', 'cj')->orWhere('email', 'cj@cj.com')->first();

        if ($adminUser && $cjUser && $adminUser->id !== $cjUser->id) {
            DB::table('users')->where('id', $cjUser->id)->delete();
            DB::table('users')->where('id', $adminUser->id)->update([
                'name' => 'AL-Taqwa Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'user_type' => 'admin',
                'password' => Hash::make('cj'),
            ]);
        } elseif ($adminUser) {
            DB::table('users')->where('id', $adminUser->id)->update([
                'name' => 'AL-Taqwa Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'user_type' => 'admin',
                'password' => Hash::make('cj'),
            ]);
        } elseif ($cjUser) {
            DB::table('users')->where('id', $cjUser->id)->update([
                'name' => 'AL-Taqwa Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'user_type' => 'admin',
                'password' => Hash::make('cj'),
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'AL-Taqwa Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'user_type' => 'admin',
                'password' => Hash::make('cj'),
                'code' => strtoupper(Str::random(10)),
            ]);
        }

        // Delete any remaining super_admin users
        DB::table('users')->where('user_type', 'super_admin')->delete();

        // 3. Remove super_admin from user_types and set admin to top level 1
        DB::table('user_types')->where('title', 'super_admin')->delete();
        DB::table('user_types')->where('title', 'admin')->update(['level' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user_types')->insertOrIgnore([
            ['title' => 'super_admin', 'name' => 'Super Admin', 'level' => 1],
        ]);
    }
}
