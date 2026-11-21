<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2026-2027'],
            ['type' => 'system_title', 'description' => 'AL-TAQWA'],
            ['type' => 'system_name', 'description' => 'AL-TAQWA INSTITUTE'],
            ['type' => 'term_ends', 'description' => '31/12/2026'],
            ['type' => 'term_begins', 'description' => '01/01/2026'],
            ['type' => 'phone', 'description' => '+91 98765 43210'],
            ['type' => 'address', 'description' => 'AL-Taqwa Institute of Islamic Studies (www.joinaltaqwa.com)'],
            ['type' => 'system_email', 'description' => 'info@joinaltaqwa.com'],
            ['type' => 'alt_email', 'description' => 'admissions@joinaltaqwa.com'],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => 'global_assets/images/altaqwa_emblem.jpg'],
            ['type' => 'next_term_fees_j', 'description' => '5000'],
            ['type' => 'next_term_fees_pn', 'description' => '5000'],
            ['type' => 'next_term_fees_p', 'description' => '5000'],
            ['type' => 'next_term_fees_n', 'description' => '5000'],
            ['type' => 'next_term_fees_s', 'description' => '5000'],
            ['type' => 'next_term_fees_c', 'description' => '5000'],
        ];

        DB::table('settings')->insert($data);

    }
}
