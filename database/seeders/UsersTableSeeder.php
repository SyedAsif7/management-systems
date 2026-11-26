<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $this->createNewUsers();
    }

    protected function createNewUsers()
    {
        $password = Hash::make('cj'); // Default user password: cj

        $d = [
            [
                'name' => 'AL-Taqwa Admin',
                'email' => 'admin@admin.com',
                'password' => $password,
                'user_type' => 'admin',
                'username' => 'admin',
                'code' => 'ADMIN01',
                'photo' => '/global_assets/images/user.png',
                'coins_balance' => 0,
                'remember_token' => Str::random(10),
            ],

            [
                'name' => 'Ustadh Ahmed',
                'email' => 'ahmed@teacher.com',
                'user_type' => 'teacher',
                'username' => 'ahmed',
                'password' => $password,
                'code' => 'TEACHER01',
                'photo' => '/global_assets/images/user.png',
                'coins_balance' => 0,
                'remember_token' => Str::random(10),
            ],

            [
                'name' => 'Syed Asif',
                'email' => 'asif@student.com',
                'user_type' => 'student',
                'username' => 'syedasif',
                'password' => $password,
                'code' => 'STUDENT01',
                'photo' => '/global_assets/images/user.png',
                'coins_balance' => 0,
                'remember_token' => Str::random(10),
            ],
        ];

        DB::table('users')->insert($d);
    }
}
