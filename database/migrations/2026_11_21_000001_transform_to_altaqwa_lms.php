<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransformToAltaqwaLms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        // 1. Cleanly deprecate physical school tables if they exist
        Schema::dropIfExists('book_requests');
        Schema::dropIfExists('books');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('pins');

        // 2. Enhance my_classes table into Courses
        Schema::table('my_classes', function (Blueprint $table) {
            if (!Schema::hasColumn('my_classes', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
            if (!Schema::hasColumn('my_classes', 'subtitle')) {
                $table->string('subtitle')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'thumbnail_url')) {
                $table->string('thumbnail_url')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'duration_label')) {
                $table->string('duration_label')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'fee_type')) {
                $table->string('fee_type')->default('one_time'); // free, one_time, monthly_subscription, refundable_deposit
            }
            if (!Schema::hasColumn('my_classes', 'mrp_price')) {
                $table->decimal('mrp_price', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('my_classes', 'selling_price')) {
                $table->decimal('selling_price', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('my_classes', 'class_days')) {
                $table->string('class_days')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'gender_eligibility')) {
                $table->string('gender_eligibility')->default('brothers_and_sisters'); // brothers_and_sisters, sisters_only
            }
            if (!Schema::hasColumn('my_classes', 'refund_threshold_percentage')) {
                $table->integer('refund_threshold_percentage')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'overview')) {
                $table->text('overview')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'syllabus')) {
                $table->text('syllabus')->nullable();
            }
            if (!Schema::hasColumn('my_classes', 'is_published')) {
                $table->boolean('is_published')->default(true);
            }
        });

        // 3. Enhance sections table into Batches / Cohorts
        Schema::table('sections', function (Blueprint $table) {
            if (!Schema::hasColumn('sections', 'live_room_id')) {
                $table->string('live_room_id')->nullable();
            }
            if (!Schema::hasColumn('sections', 'meeting_link')) {
                $table->string('meeting_link')->nullable();
            }
            if (!Schema::hasColumn('sections', 'batch_start_date')) {
                $table->date('batch_start_date')->nullable();
            }
            if (!Schema::hasColumn('sections', 'class_timing')) {
                $table->string('class_timing')->nullable();
            }
        });

        // 4. Create enrollments table
        if (!Schema::hasTable('enrollments')) {
            Schema::create('enrollments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('student_id');
                $table->unsignedInteger('my_class_id');
                $table->unsignedInteger('section_id')->nullable();
                $table->unsignedInteger('payment_id')->nullable();
                $table->string('order_id')->nullable();
                $table->decimal('amount_paid', 10, 2)->default(0);
                $table->string('fee_type')->default('one_time');
                $table->string('status')->default('active'); // active, expired, completed, scholarship
                $table->date('valid_until')->nullable();
                $table->boolean('eligible_for_refund')->default(false);
                $table->string('refund_status')->default('none'); // none, requested, processed, declined
                $table->timestamps();
            });
        }

        // 5. Create live_sessions table
        if (!Schema::hasTable('live_sessions')) {
            Schema::create('live_sessions', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('section_id');
                $table->string('title');
                $table->date('session_date');
                $table->string('start_time')->nullable();
                $table->string('end_time')->nullable();
                $table->string('live_room_id')->nullable();
                $table->string('meeting_url')->nullable();
                $table->string('recording_url')->nullable();
                $table->string('notes_pdf_url')->nullable();
                $table->string('status')->default('scheduled'); // scheduled, live, completed
                $table->timestamps();
            });
        }

        // 6. Create hifz_logs table
        if (!Schema::hasTable('hifz_logs')) {
            Schema::create('hifz_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('student_id');
                $table->unsignedBigInteger('teacher_id')->nullable();
                $table->date('date');
                $table->string('sabaq_surah_ayah')->nullable(); // e.g., Surah Al-Baqarah Ayah 1-10
                $table->string('sabqi_status')->nullable();     // e.g., Excellent, Good, Fair, Needs Work
                $table->string('manzil_juz')->nullable();       // e.g., Juz 1-2
                $table->string('attendance_status')->default('present'); // present, absent, excused
                $table->text('ustadh_remarks')->nullable();
                $table->timestamps();
            });
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('hifz_logs');
        Schema::dropIfExists('live_sessions');
        Schema::dropIfExists('enrollments');
        Schema::enableForeignKeyConstraints();
    }
}
