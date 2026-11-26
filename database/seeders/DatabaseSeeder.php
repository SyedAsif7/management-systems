<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        $this->call(BloodGroupsTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(DormsTableSeeder::class);
        $this->call(ClassTypesTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(AltaqwaCourseSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LgasTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        // $this->call(AltaqwaEnrollmentSeeder::class); // Disabled: No dummy student enrollments

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
