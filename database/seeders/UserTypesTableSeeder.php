<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'admin', 'name' => 'Admin', 'level' => 1],
            ['title' => 'teacher', 'name' => 'Teacher', 'level' => 2],
        ];
        DB::table('user_types')->insert($data);
    }
}
