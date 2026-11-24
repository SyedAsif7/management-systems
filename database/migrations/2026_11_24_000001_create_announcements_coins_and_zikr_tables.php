<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsCoinsAndZikrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Announcements Table
        if (!Schema::hasTable('announcements')) {
            Schema::create('announcements', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->string('badge_text')->nullable(); // e.g. 'NEW BATCH', 'SCHOLARSHIP', '100% REFUNDABLE'
                $table->string('image_url')->nullable();
                $table->string('cta_text')->nullable();
                $table->string('cta_link')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->dateTime('starts_at')->nullable();
                $table->dateTime('ends_at')->nullable();
                $table->timestamps();
            });
        }

        // 2. Add coins_balance to users table
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'coins_balance')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('coins_balance')->default(50)->after('user_type');
            });
        }

        // 3. Coin Transactions Table
        if (!Schema::hasTable('coin_transactions')) {
            Schema::create('coin_transactions', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->integer('amount'); // positive for earn, negative/positive magnitude
                $table->string('type'); // 'earn' or 'redeem'
                $table->string('source'); // 'welcome_bonus', 'daily_streak', 'halqa_attendance', 'hifz_milestone', 'zikr_completion', 'course_discount'
                $table->string('description')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        // 4. Zikr & Durood Logs Table
        if (!Schema::hasTable('zikr_logs')) {
            Schema::create('zikr_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id')->nullable();
                $table->string('zikr_type')->default('durood_sharif'); // 'durood_sharif', 'subhanallah', 'alhamdulillah', 'allahu_akbar', 'astaghfirullah'
                $table->integer('count')->default(1);
                $table->string('ip_address')->nullable();
                $table->string('session_id')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zikr_logs');
        Schema::dropIfExists('coin_transactions');
        
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'coins_balance')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('coins_balance');
            });
        }

        Schema::dropIfExists('announcements');
    }
}
