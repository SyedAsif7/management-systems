<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\MyClass;
use App\Models\Section;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AltaqwaEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds for sample enrollments & certificates.
     *
     * @return void
     */
    public function run()
    {
        // 1. Create or ensure sample verified students exist
        $studentsData = [
            [
                'name' => 'Zaid Al-Mansoor',
                'username' => 'zaid_mansoor',
                'email' => 'zaid.mansoor@example.com',
                'gender' => 'Male',
                'user_type' => 'student',
                'code' => strtoupper(Str::random(10)),
                'password' => Hash::make('student'),
            ],
            [
                'name' => 'Fatima Az-Zahra',
                'username' => 'fatima_zahra',
                'email' => 'fatima.zahra@example.com',
                'gender' => 'Female',
                'user_type' => 'student',
                'code' => strtoupper(Str::random(10)),
                'password' => Hash::make('student'),
            ],
            [
                'name' => 'Muhammad Bilal Farooq',
                'username' => 'bilal_farooq',
                'email' => 'bilal.farooq@example.com',
                'gender' => 'Male',
                'user_type' => 'student',
                'code' => strtoupper(Str::random(10)),
                'password' => Hash::make('student'),
            ],
            [
                'name' => 'Amina Binte Khalid',
                'username' => 'amina_khalid',
                'email' => 'amina.khalid@example.com',
                'gender' => 'Female',
                'user_type' => 'student',
                'code' => strtoupper(Str::random(10)),
                'password' => Hash::make('student'),
            ],
        ];

        $studentMap = [];
        foreach ($studentsData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
            $studentMap[$data['name']] = $user->id;
        }

        // Also check if default Student CJ exists
        $studentCj = User::where('user_type', 'student')->first();
        $studentCjId = $studentCj ? $studentCj->id : 18;

        // 2. Define Sample Completed Enrollments with official Certificate / Order IDs
        $sampleCerts = [
            [
                'order_id' => 'ALT-2026-CERT01',
                'student_id' => $studentMap['Zaid Al-Mansoor'] ?? $studentCjId,
                'slug' => 'tafseer-ul-quran-weekend-program',
                'section_name' => 'Weekend Morning Batch',
                'amount_paid' => 99.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
            [
                'order_id' => 'ALT-2026-CERT02',
                'student_id' => $studentMap['Fatima Az-Zahra'] ?? $studentCjId,
                'slug' => 'diploma-in-tajweed-e-quran',
                'section_name' => 'Daily Evening Cohort',
                'amount_paid' => 499.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
            [
                'order_id' => 'ALT-2026-CERT03',
                'student_id' => $studentMap['Muhammad Bilal Farooq'] ?? $studentCjId,
                'slug' => 'hifz-ul-quran-program-advanced-diploma',
                'section_name' => 'Huffaz Cohort 1',
                'amount_paid' => 1500.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYears(2),
            ],
            [
                'order_id' => 'ALT-2026-CERT04',
                'student_id' => $studentMap['Amina Binte Khalid'] ?? $studentCjId,
                'slug' => 'alima-course-advanced-diploma-in-islamic-studies',
                'section_name' => 'Alimat Year 1 Cohort',
                'amount_paid' => 599.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYears(2),
            ],
            [
                'order_id' => 'ALTAQWA-98421',
                'student_id' => $studentCjId,
                'slug' => 'seerat-un-nabi-program',
                'section_name' => 'General Community Batch',
                'amount_paid' => 0.00,
                'fee_type' => 'free',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
        ];

        foreach ($sampleCerts as $cert) {
            $course = MyClass::where('slug', $cert['slug'])->first();
            if (!$course) {
                continue;
            }

            $section = Section::where('my_class_id', $course->id)->first();
            $sectionId = $section ? $section->id : null;

            Enrollment::updateOrCreate(
                ['order_id' => $cert['order_id']],
                [
                    'student_id' => $cert['student_id'],
                    'my_class_id' => $course->id,
                    'section_id' => $sectionId,
                    'amount_paid' => $cert['amount_paid'],
                    'fee_type' => $cert['fee_type'],
                    'status' => $cert['status'],
                    'valid_until' => $cert['valid_until'],
                    'eligible_for_refund' => false,
                    'refund_status' => 'none',
                ]
            );
        }
    }
}
