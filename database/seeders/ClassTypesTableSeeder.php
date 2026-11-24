<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 7, 'name' => "Qur'an & Tajweed", 'code' => 'QT'],
            ['id' => 8, 'name' => 'Islamic Studies', 'code' => 'IS'],
            ['id' => 9, 'name' => 'Arabic & Urdu', 'code' => 'AU'],
            ['id' => 10, 'name' => 'Workshops & Short Courses', 'code' => 'WS'],
        ];

        foreach ($data as $d) {
            DB::table('class_types')->updateOrInsert(['id' => $d['id']], $d);
        }
    }
}
