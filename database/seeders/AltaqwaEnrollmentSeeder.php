<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\HifzLog;
use App\Models\LiveSession;
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

        // Also check if default Student CJ and Teacher Chike exist
        $studentCj = User::where('user_type', 'student')->where('email', 'student@student.com')->first() ?: User::where('user_type', 'student')->first();
        $studentCjId = $studentCj ? $studentCj->id : 18;

        $teacher = User::where('user_type', 'teacher')->first();
        $teacherId = $teacher ? $teacher->id : 3;

        // 2. Assign Teacher to Islamic Sections
        Section::whereIn('name', [
            'Weekend Morning Batch',
            'Daily Evening Cohort',
            'Huffaz Cohort 1',
            'General Community Batch',
            'Urdu Fluency Cohort',
            'Noorani Qaida Beginners',
            'Alimat Year 1 Cohort'
        ])->update(['teacher_id' => $teacherId]);

        // 3. Define Sample Enrollments with official Certificate / Order IDs
        $sampleCerts = [
            [
                'order_id' => 'ALT-2026-CERT01',
                'student_id' => $studentMap['Zaid Al-Mansoor'] ?? $studentCjId,
                'slug' => 'tafseer-ul-quran-weekend-program',
                'amount_paid' => 99.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
            [
                'order_id' => 'ALT-2026-CERT02',
                'student_id' => $studentMap['Fatima Az-Zahra'] ?? $studentCjId,
                'slug' => 'diploma-in-tajweed-e-quran',
                'amount_paid' => 499.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
            [
                'order_id' => 'ALT-2026-CERT03',
                'student_id' => $studentMap['Muhammad Bilal Farooq'] ?? $studentCjId,
                'slug' => 'hifz-ul-quran-program-advanced-diploma',
                'amount_paid' => 1500.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYears(2),
            ],
            [
                'order_id' => 'ALT-2026-CERT04',
                'student_id' => $studentMap['Amina Binte Khalid'] ?? $studentCjId,
                'slug' => 'alima-course-advanced-diploma-in-islamic-studies',
                'amount_paid' => 599.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYears(2),
            ],
            [
                'order_id' => 'ALTAQWA-98421',
                'student_id' => $studentCjId,
                'slug' => 'seerat-un-nabi-program',
                'amount_paid' => 0.00,
                'fee_type' => 'free',
                'status' => 'completed',
                'valid_until' => Carbon::now()->addYear(),
            ],
            // Active enrollments for Student CJ so their active classroom is full of life
            [
                'order_id' => 'ALT-ORD-10928',
                'student_id' => $studentCjId,
                'slug' => 'tafseer-ul-quran-weekend-program',
                'amount_paid' => 99.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'active',
                'valid_until' => Carbon::now()->addMonth(),
            ],
            [
                'order_id' => 'ALT-ORD-10929',
                'student_id' => $studentCjId,
                'slug' => 'diploma-in-tajweed-e-quran',
                'amount_paid' => 499.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'active',
                'valid_until' => Carbon::now()->addMonth(),
            ],
            [
                'order_id' => 'ALT-ORD-10930',
                'student_id' => $studentMap['Zaid Al-Mansoor'] ?? $studentCjId,
                'slug' => 'hifz-ul-quran-program-advanced-diploma',
                'amount_paid' => 1500.00,
                'fee_type' => 'monthly_subscription',
                'status' => 'active',
                'valid_until' => Carbon::now()->addMonth(),
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

        // 4. Seed Live Sessions
        $tafseerSection = Section::where('name', 'Weekend Morning Batch')->first();
        $tajweedSection = Section::where('name', 'Daily Evening Cohort')->first();
        $seeratSection = Section::where('name', 'General Community Batch')->first();

        if ($tafseerSection) {
            LiveSession::updateOrCreate(
                ['title' => 'Surah Al-Baqarah: Tafseer & Ayat Reflection', 'section_id' => $tafseerSection->id],
                [
                    'session_date' => Carbon::today(),
                    'start_time' => '10:00 AM',
                    'end_time' => '11:30 AM IST',
                    'live_room_id' => $tafseerSection->live_room_id ?: 'altaqwa-tafseer-b1',
                    'meeting_url' => $tafseerSection->meeting_link ?: 'https://meet.jit.si/altaqwa-tafseer-b1',
                    'status' => 'scheduled',
                ]
            );
        }

        if ($tajweedSection) {
            LiveSession::updateOrCreate(
                ['title' => 'Makharij & Sifaat: Articulation Practice Halqa', 'section_id' => $tajweedSection->id],
                [
                    'session_date' => Carbon::tomorrow(),
                    'start_time' => '06:00 PM',
                    'end_time' => '07:00 PM IST',
                    'live_room_id' => $tajweedSection->live_room_id ?: 'altaqwa-tajweed-b1',
                    'meeting_url' => $tajweedSection->meeting_link ?: 'https://meet.jit.si/altaqwa-tajweed-b1',
                    'status' => 'scheduled',
                ]
            );
        }

        if ($seeratSection) {
            LiveSession::updateOrCreate(
                ['title' => 'The Prophet ﷺ in Makkah: Early Da’wah & Patience', 'section_id' => $seeratSection->id],
                [
                    'session_date' => Carbon::yesterday(),
                    'start_time' => '05:00 PM',
                    'end_time' => '06:30 PM IST',
                    'live_room_id' => $seeratSection->live_room_id ?: 'altaqwa-seerat-b1',
                    'meeting_url' => $seeratSection->meeting_link ?: 'https://meet.jit.si/altaqwa-seerat-b1',
                    'recording_url' => 'https://www.youtube.com/watch?v=live-altaqwa-seerat',
                    'notes_pdf_url' => '/storage/notes/seerat_session_01.pdf',
                    'status' => 'completed',
                ]
            );
        }

        // 5. Seed Hifz Tracker Logs
        $hifzLogs = [
            [
                'student_id' => $studentMap['Zaid Al-Mansoor'] ?? $studentCjId,
                'teacher_id' => $teacherId,
                'date' => Carbon::today()->toDateString(),
                'sabaq_surah_ayah' => 'Surah Al-Baqarah (Ayat 1-25)',
                'sabqi_status' => 'Excellent (Mumtaz)',
                'manzil_juz' => 'Juz 1',
                'attendance_status' => 'present',
                'ustadh_remarks' => 'MashaAllah, fluent recitation with clear ghunnah and ikhfa. Maintained proper pacing throughout.',
            ],
            [
                'student_id' => $studentCjId,
                'teacher_id' => $teacherId,
                'date' => Carbon::today()->subDay()->toDateString(),
                'sabaq_surah_ayah' => 'Surah An-Naba (Ayat 1-40)',
                'sabqi_status' => 'Very Good (Jayyid Jiddan)',
                'manzil_juz' => 'Juz 30 (Amma)',
                'attendance_status' => 'present',
                'ustadh_remarks' => 'Completed Juz Amma revision with accurate Makharij. Recommended for Sabaq of Surah An-Nazi’at next.',
            ],
            [
                'student_id' => $studentMap['Muhammad Bilal Farooq'] ?? $studentCjId,
                'teacher_id' => $teacherId,
                'date' => Carbon::today()->toDateString(),
                'sabaq_surah_ayah' => 'Surah Ali-Imran (Ayat 50-75)',
                'sabqi_status' => 'Good (Jayyid)',
                'manzil_juz' => 'Juz 3',
                'attendance_status' => 'present',
                'ustadh_remarks' => 'Recitation is strong. Pay closer attention to Madd Munfasil length (4-5 Harakat).',
            ],
        ];

        foreach ($hifzLogs as $log) {
            HifzLog::updateOrCreate(
                [
                    'student_id' => $log['student_id'],
                    'date' => $log['date'],
                    'sabaq_surah_ayah' => $log['sabaq_surah_ayah'],
                ],
                $log
            );
        }
    }
}
