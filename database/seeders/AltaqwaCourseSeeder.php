<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AltaqwaCourseSeeder extends Seeder
{
    /**
     * Run the database seeds for AL-Taqwa Institute.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed / Update Course Categories (Class Types)
        $categories = [
            'QT' => ['name' => "Qur'an & Tajweed", 'code' => 'QT'],
            'IS' => ['name' => 'Islamic Studies', 'code' => 'IS'],
            'AU' => ['name' => 'Arabic & Urdu', 'code' => 'AU'],
            'WS' => ['name' => 'Workshops & Short Courses', 'code' => 'WS'],
        ];

        $catIds = [];
        foreach ($categories as $code => $cat) {
            $existing = DB::table('class_types')->where('code', $code)->first();
            if ($existing) {
                $catIds[$code] = $existing->id;
                DB::table('class_types')->where('id', $existing->id)->update(['name' => $cat['name']]);
            } else {
                $catIds[$code] = DB::table('class_types')->insertGetId([
                    'name' => $cat['name'],
                    'code' => $cat['code'],
                ]);
            }
        }

        // 2. Define the 12 Official AL-Taqwa Courses
        $courses = [
            [
                'name' => 'Tafseer-ul-Qur’an — Weekend Program',
                'slug' => 'tafseer-ul-quran-weekend-program',
                'category_code' => 'QT',
                'subtitle' => "In-depth study and reflection of the Noble Qur'an with classical & contemporary commentary",
                'thumbnail_url' => '/assets/images/courses/tafseer-ul-quran.jpg',
                'duration_label' => '2 Years',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 199.00,
                'selling_price' => 99.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Connect your heart with the divine words of Allah SWT. This 2-year weekend course provides verse-by-verse explanation, historical context of revelation (Asbab al-Nuzul), linguistic nuances, and actionable life lessons based on authentic classical commentaries including Tafsir Ibn Kathir, Ma\'ariful Qur\'an, and Jalalayn.',
                'syllabus' => json_encode([
                    'Term 1' => 'Surah Al-Fatiha to Surah Al-Baqarah (Juz 1-3)',
                    'Term 2' => 'Surah Ali Imran & Surah An-Nisa (Juz 4-6)',
                    'Term 3' => 'Surah Al-Ma\'idah to Surah Al-A\'raf (Juz 7-9)',
                    'Term 4' => 'Selected Surahs of Juz Amma & Practical Reflection',
                ]),
                'batch_name' => 'Weekend Morning Batch',
                'live_room_id' => 'altaqwa-tafseer-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-tafseer-b1',
                'class_timing' => '07:30 AM - 09:00 AM IST',
            ],
            [
                'name' => 'Seerat-un-Nabi ﷺ Program',
                'slug' => 'seerat-un-nabi-program',
                'category_code' => 'IS',
                'subtitle' => 'Comprehensive life, character, and prophetic guidance of Prophet Muhammad ﷺ',
                'thumbnail_url' => '/assets/images/courses/seerat-un-nabi.jpg',
                'duration_label' => '6 Months',
                'fee_type' => 'free',
                'mrp_price' => 0.00,
                'selling_price' => 0.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'A blessed, 100% free community initiative to study the beautiful life and sublime manners of Rasulullah ﷺ. From the pre-Islamic Arabian era, birth, early life, Prophethood in Makkah, Hijrah, establishment of the Madinan state, treaties, battles, and the Farewell Pilgrimage.',
                'syllabus' => json_encode([
                    'Month 1' => 'Pre-Islamic Jahiliyyah Arabia & Lineage of the Prophet ﷺ',
                    'Month 2' => 'Early Life, Marriage to Khadijah RA & First Revelation',
                    'Month 3' => 'The Makkan Phase, Persecution, Isra & Mi\'raj',
                    'Month 4' => 'Hijrah to Madinah & Establishing Brotherhood',
                    'Month 5' => 'Treaty of Hudaybiyyah & Conquest of Makkah',
                    'Month 6' => 'Farewell Hajj, Final Illness & Legacy of the Sunnah',
                ]),
                'batch_name' => 'General Community Batch',
                'live_room_id' => 'altaqwa-seerat-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-seerat-b1',
                'class_timing' => '05:30 PM - 06:45 PM IST',
            ],
            [
                'name' => 'Free Namaz Translation Workshop',
                'slug' => 'free-namaz-translation-workshop',
                'category_code' => 'WS',
                'subtitle' => 'Word-by-word Namaz translation and Khushoo workshop. 100% Refundable on ≥75% completion',
                'thumbnail_url' => '/assets/images/courses/namaz-workshop.jpg',
                'duration_label' => '3 Days',
                'fee_type' => 'refundable_deposit',
                'mrp_price' => 299.00,
                'selling_price' => 99.00,
                'class_days' => 'Friday to Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => 75,
                'overview' => 'Transform your daily prayer from mechanical movements into an intimate conversation with your Creator. Learn word-for-word translation of Sana, Surah Fatiha, Ruku, Sajdah, Tashahhud, Durood, and ending duas. The ₹99 deposit ensures commitment and is 100% refunded when you attend all 3 days and score ≥75% on the quick final quiz.',
                'syllabus' => json_encode([
                    'Day 1' => 'Spiritual Meaning of Takbeerat, Sana & Surah Al-Fatiha',
                    'Day 2' => 'Tasbeehat of Ruku, Qauma, Sujood & Jalsa between Sajdahs',
                    'Day 3' => 'At-Tahiyyat, Durood-e-Ibrahim, Rabbana Duas & Khushoo Secrets',
                ]),
                'batch_name' => 'Monthly Weekend Cohort',
                'live_room_id' => 'altaqwa-namaz-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-namaz-b1',
                'class_timing' => '08:30 PM - 10:00 PM IST',
            ],
            [
                'name' => 'Diploma in Tajweed-e-Quran',
                'slug' => 'diploma-in-tajweed-e-quran',
                'category_code' => 'QT',
                'subtitle' => 'Master Makharij, Sifaat, and Tarteel rules with live recitation correction and Ijazah preparation',
                'thumbnail_url' => '/assets/images/courses/tajweed-e-quran.jpg',
                'duration_label' => '12 Months',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 999.00,
                'selling_price' => 499.00,
                'class_days' => 'Saturday to Thursday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Attain excellence in Quranic recitation according to the narration of Hafs \'an \'Asim. Students receive live one-on-one and small group vocal correction covering articulation points (Makharij al-Huruf), intrinsic characteristics (Sifaat), Noon/Meem Sakinah, Madd rules, Waqf, and Ibtida.',
                'syllabus' => json_encode([
                    'Quarter 1' => 'Makharij: Throat, Tongue, Lips, and Nasal Cavity',
                    'Quarter 2' => 'Sifaat with and without Opposites (Hams, Jahr, Qalqalah)',
                    'Quarter 3' => 'Rules of Noon & Meem Sakinah, Tanween, and Ghunnah',
                    'Quarter 4' => 'Madd Divisions, Stopping Rules (Waqf) & Practical Juz Amma Recitation',
                ]),
                'batch_name' => 'Daily Evening Cohort',
                'live_room_id' => 'altaqwa-tajweed-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-tajweed-b1',
                'class_timing' => '06:00 PM - 07:15 PM IST',
            ],
            [
                'name' => 'Certificate in Urdu Reading & Writing',
                'slug' => 'certificate-in-urdu-reading-and-writing',
                'category_code' => 'AU',
                'subtitle' => 'Read, write, and comprehend Urdu classical prose, poetry, and Islamic texts from scratch',
                'thumbnail_url' => '/assets/images/courses/urdu-reading-writing.jpg',
                'duration_label' => '5 Months',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 899.00,
                'selling_price' => 499.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Designed for diaspora learners, beginners, and students of Islamic knowledge seeking direct access to classical subcontinental Islamic scholarship, Tafaseer, Hadith translations, and Urdu literature.',
                'syllabus' => json_encode([
                    'Month 1' => 'Huroof-e-Tahajji (Alphabets), Sounds & Basic Joins',
                    'Month 2' => 'Two-Letter and Three-Letter Word Formations',
                    'Month 3' => 'Sentence Construction, I\'raab & Grammatical Connectors',
                    'Month 4' => 'Reading Selected Stories of the Prophets in Urdu',
                    'Month 5' => 'Writing Practice, Dictation & Islamic Comprehension',
                ]),
                'batch_name' => 'Weekend Morning Batch',
                'live_room_id' => 'altaqwa-urdu-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-urdu-b1',
                'class_timing' => '10:00 AM - 11:30 AM IST',
            ],
            [
                'name' => 'Certificate in Basic Arabic Reading — Noorani Qaida',
                'slug' => 'certificate-in-basic-arabic-reading-noorani-qaida',
                'category_code' => 'AU',
                'subtitle' => 'Foundation course for children and adults to learn Quranic Arabic alphabets and phonetics',
                'thumbnail_url' => '/assets/images/courses/noorani-qaida.jpg',
                'duration_label' => '6 Months',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 899.00,
                'selling_price' => 499.00,
                'class_days' => 'Saturday to Thursday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'A step-by-step phonetics-based method designed to build fluency in reading the Holy Qur\'an with accurate pronunciation. Ideal for complete beginners of all ages.',
                'syllabus' => json_encode([
                    'Lesson 1-4' => 'Single Letters, Compound Letters (Murakkabat) & Huruf Muqatta\'at',
                    'Lesson 5-8' => 'Harakat (Fathah, Kasrah, Dammah) & Tanween',
                    'Lesson 9-12' => 'Khari Harakat, Huruf Maddah & Huruf Leen',
                    'Lesson 13-17' => 'Sukoon (Jazm), Tashdeed, and Quranic Word Practice',
                ]),
                'batch_name' => 'Foundation Batch A',
                'live_room_id' => 'altaqwa-qaida-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-qaida-b1',
                'class_timing' => '04:30 PM - 05:30 PM IST',
            ],
            [
                'name' => 'Certificate in Islamic Public Speaking & Content Creation',
                'slug' => 'certificate-in-islamic-public-speaking-and-content-creation',
                'category_code' => 'WS',
                'subtitle' => 'Master modern communication, Dawah delivery, video presentation, and scriptwriting for Islam',
                'thumbnail_url' => '/assets/images/courses/public-speaking.jpg',
                'duration_label' => '3 Months',
                'fee_type' => 'one_time',
                'mrp_price' => 1999.00,
                'selling_price' => 999.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Empowering youth and community leaders to convey the beauty of Islam with eloquence, confidence, and digital excellence. Learn oratory skills, overcoming stage fright, structuring Friday Khutbahs, short-form video scripting (Reels/YouTube), and ethical digital outreach.',
                'syllabus' => json_encode([
                    'Month 1' => 'The Art of Prophetic Oratory & Vocal Modulation',
                    'Month 2' => 'Structuring Bayans, Khutbahs & Engaging Storytelling',
                    'Month 3' => 'Scriptwriting for Social Media, Camera Confidence & Live Delivery Capstone',
                ]),
                'batch_name' => 'Youth Leadership Batch',
                'live_room_id' => 'altaqwa-speaking-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-speaking-b1',
                'class_timing' => '08:00 PM - 09:30 PM IST',
            ],
            [
                'name' => 'Certificate in Basic Islamic Beliefs — Tawheed & Aqeedah',
                'slug' => 'certificate-in-basic-islamic-beliefs-tawheed-and-aqeedah',
                'category_code' => 'IS',
                'subtitle' => 'Core Sunni Islamic beliefs, Tawheed, Prophethood, and Akhirah. 100% Refundable on ≥80% score',
                'thumbnail_url' => '/assets/images/courses/tawheed-aqeedah.jpg',
                'duration_label' => '3 Months',
                'fee_type' => 'refundable_deposit',
                'mrp_price' => 999.00,
                'selling_price' => 499.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => 80,
                'overview' => 'Ground your faith on unshakeable foundations. Understand the attributes of Allah, the reality of angels, divine revelation, destiny (Qadar), life after death, and answers to modern ideological doubts. Achieve ≥80% on the final assessment to claim an automatic 100% refund of your course deposit!',
                'syllabus' => json_encode([
                    'Month 1' => 'Tawheed (Rububiyyah, Uluhiyyah, Asma wa Sifaat) & Avoiding Shirk',
                    'Month 2' => 'Belief in Angels, Books, Messengers & the Unseen',
                    'Month 3' => 'Day of Judgment, Barzakh, Qadar & Safeguarding Faith in the Modern World',
                ]),
                'batch_name' => 'Aqeedah Cohort 1',
                'live_room_id' => 'altaqwa-aqeedah-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-aqeedah-b1',
                'class_timing' => '07:00 PM - 08:30 PM IST',
            ],
            [
                'name' => 'Certificate in Salah, Duas & Sunnah Lifestyle',
                'slug' => 'certificate-in-salah-duas-and-sunnah-lifestyle',
                'category_code' => 'IS',
                'subtitle' => 'Practical Fiqh of Taharah, Salah, Masnoon Duas, and everyday Sunnah etiquettes',
                'thumbnail_url' => '/assets/images/courses/salah-sunnah-lifestyle.jpg',
                'duration_label' => '3 Months',
                'fee_type' => 'one_time',
                'mrp_price' => 899.00,
                'selling_price' => 499.00,
                'class_days' => 'Saturday & Sunday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Revive the Sunnah in your everyday life. A practical guide covering Wudu, Ghusl, Tayammum, common mistakes in Salah, Sajdah Sahw, Janazah basics, and memorization of authentic 24-hour Masnoon Duas from Hisnul Muslim.',
                'syllabus' => json_encode([
                    'Month 1' => 'Taharah: Conditions, Nullifiers of Wudu & Practical Demonstration',
                    'Month 2' => 'Fiqh of Salah: Arkaan, Waajibaat, Sunan & Rectifying Errors',
                    'Month 3' => 'Daily Sunan of Sleeping, Eating, Travelling & Morning/Evening Adhkar',
                ]),
                'batch_name' => 'Sunnah Lifestyle Batch',
                'live_room_id' => 'altaqwa-sunnah-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-sunnah-b1',
                'class_timing' => '09:00 AM - 10:30 AM IST',
            ],
            [
                'name' => 'Diploma in Arabic Language',
                'slug' => 'diploma-in-arabic-language',
                'category_code' => 'AU',
                'subtitle' => 'Grammar (Nahw), Morphology (Sarf), Quranic vocabulary, and conversational modern standard Arabic',
                'thumbnail_url' => '/assets/images/courses/arabic-language.jpg',
                'duration_label' => '12 Months',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 1299.00,
                'selling_price' => 699.00,
                'class_days' => 'Saturday to Thursday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'Unlock the language of the Qur\'an and Islamic tradition. Based on the celebrated Madinah Books and classical grammar manuals, students master nominal and verbal sentence structures, verb conjugations (Abwaab), and build a 2,000-word Quranic vocabulary.',
                'syllabus' => json_encode([
                    'Quarter 1' => 'Madinah Book 1: Ism, Harf, Demonstatives & Idafah',
                    'Quarter 2' => 'Madinah Book 2 (Part A): Past & Present Tense Verbs, Pronouns',
                    'Quarter 3' => 'Madinah Book 2 (Part B) & Introductory Sarf (Verb Forms I-X)',
                    'Quarter 4' => 'Madinah Book 3 & Direct Quranic Syntactical Analysis (I\'raab)',
                ]),
                'batch_name' => 'Arabic Language Cohort A',
                'live_room_id' => 'altaqwa-arabic-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-arabic-b1',
                'class_timing' => '08:00 PM - 09:15 PM IST',
            ],
            [
                'name' => 'Hifz-ul-Qur’an Program — Advanced Diploma',
                'slug' => 'hifz-ul-quran-program-advanced-diploma',
                'category_code' => 'QT',
                'subtitle' => 'Structured 4-year Quran memorization with daily Sabaq, Sabqi, and Manzil tracking under certified Huffaz',
                'thumbnail_url' => '/assets/images/courses/hifz-ul-quran.jpg',
                'duration_label' => '4 Years',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 2500.00,
                'selling_price' => 1500.00,
                'class_days' => 'Saturday to Thursday',
                'gender_eligibility' => 'brothers_and_sisters',
                'refund_threshold_percentage' => null,
                'overview' => 'An intensive memorization sanctuary for serious seekers of the Quran. Students follow the time-tested tripartite system: 1) Sabaq (Daily New Lesson), 2) Sabqi (Recent 1-2 Juz Revision), and 3) Manzil (Long-term Cumulative Juz Cycle). Daily performance is logged in the LMS portal for parents and mentors.',
                'syllabus' => json_encode([
                    'Year 1' => 'Memorization of Juz 30 to Juz 24 (7 Juz) with strict Tarteel',
                    'Year 2' => 'Memorization of Juz 23 to Juz 16 (8 Juz) & Continuous Revision',
                    'Year 3' => 'Memorization of Juz 15 to Juz 8 (8 Juz) & Quarterly Daur Trials',
                    'Year 4' => 'Memorization of Juz 7 to Juz 1 (7 Juz), Grand Daur & Sanad Exam',
                ]),
                'batch_name' => 'Huffaz Cohort 1',
                'live_room_id' => 'altaqwa-hifz-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-hifz-b1',
                'class_timing' => '05:30 AM - 07:00 AM IST',
            ],
            [
                'name' => 'Alima Course — Advanced Diploma in Islamic Studies',
                'slug' => 'alima-course-advanced-diploma-in-islamic-studies',
                'category_code' => 'IS',
                'subtitle' => 'Rigorous 4-year Dars-e-Nizami curriculum for sisters covering Tafseer, Hadith, Usul-ul-Fiqh, and Arabic. Need-based scholarships available.',
                'thumbnail_url' => '/assets/images/courses/alima-course.jpg',
                'duration_label' => '4 Years',
                'fee_type' => 'monthly_subscription',
                'mrp_price' => 1199.00,
                'selling_price' => 599.00,
                'class_days' => 'Saturday to Thursday',
                'gender_eligibility' => 'sisters_only',
                'refund_threshold_percentage' => null,
                'overview' => 'A comprehensive, traditional Islamic scholarship journey for sisters delivered entirely online by qualified Alimaat and female Islamic scholars. Curriculum includes Arabic Grammar & Literature, Fiqh (Al-Hidayah / Quduri), Usul al-Fiqh, Usul al-Hadith, Tafseer Jalalayn, Riyad al-Saliheen, and Mishkat al-Masabih. 100% need-based scholarships supported.',
                'syllabus' => json_encode([
                    'Year 1' => 'Arabic Nahw & Sarf, Al-Qira\'at al-Rashidah, Fiqh al-Muyassar & Tajweed',
                    'Year 2' => 'Mukhtasar al-Quduri, Usul al-Shashi, Arabic Balaghah & Seerah',
                    'Year 3' => 'Tafseer al-Jalalayn (First Half), Mishkat al-Masabih (Vol 1) & Fiqh of Mua\'malat',
                    'Year 4' => 'Tafseer al-Jalalayn (Second Half), Riyad al-Saliheen, Dawah & Contemporary Issues',
                ]),
                'batch_name' => 'Alimat Year 1 Cohort',
                'live_room_id' => 'altaqwa-alima-b1',
                'meeting_link' => 'https://meet.jit.si/altaqwa-alima-b1',
                'class_timing' => '03:00 PM - 05:30 PM IST',
            ],
        ];

        // 3. Insert / Update Courses & Batches
        foreach ($courses as $c) {
            $catId = $catIds[$c['category_code']];
            $classData = [
                'name' => $c['name'],
                'slug' => $c['slug'],
                'class_type_id' => $catId,
                'subtitle' => $c['subtitle'],
                'thumbnail_url' => $c['thumbnail_url'],
                'duration_label' => $c['duration_label'],
                'fee_type' => $c['fee_type'],
                'mrp_price' => $c['mrp_price'],
                'selling_price' => $c['selling_price'],
                'class_days' => $c['class_days'],
                'gender_eligibility' => $c['gender_eligibility'],
                'refund_threshold_percentage' => $c['refund_threshold_percentage'],
                'overview' => $c['overview'],
                'syllabus' => $c['syllabus'],
                'is_published' => true,
            ];

            $existingClass = DB::table('my_classes')->where('slug', $c['slug'])->first();
            if ($existingClass) {
                DB::table('my_classes')->where('id', $existingClass->id)->update($classData);
                $classId = $existingClass->id;
            } else {
                $classId = DB::table('my_classes')->insertGetId($classData);
            }

            // Create default batch / section if not present
            $existingSection = DB::table('sections')->where('my_class_id', $classId)->first();
            $sectionData = [
                'name' => $c['batch_name'],
                'my_class_id' => $classId,
                'live_room_id' => $c['live_room_id'],
                'meeting_link' => $c['meeting_link'],
                'class_timing' => $c['class_timing'],
                'active' => 1,
            ];

            if ($existingSection) {
                DB::table('sections')->where('id', $existingSection->id)->update($sectionData);
            } else {
                DB::table('sections')->insert($sectionData);
            }
        }

        // 4. Update System Settings to AL-Taqwa defaults
        $settings = [
            'system_name' => 'AL-Taqwa Institute',
            'system_title' => 'AL-TAQWA',
            'phone' => '+91 98765 43210',
            'system_email' => 'admissions@joinaltaqwa.com',
            'address' => 'Online Islamic Academy — www.joinaltaqwa.com',
            'current_session' => date('Y').'-'.(date('Y')+1),
        ];

        foreach ($settings as $type => $desc) {
            $existingSetting = DB::table('settings')->where('type', $type)->first();
            if ($existingSetting) {
                DB::table('settings')->where('type', $type)->update(['description' => $desc]);
            } else {
                DB::table('settings')->insert(['type' => $type, 'description' => $desc]);
            }
        }
    }
}
