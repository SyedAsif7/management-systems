@extends('layouts.storefront')

@section('title', 'Taqwa Coins Leaderboard — AL-TAQWA Institute of Islamic Studies')

@section('styles')
<style>
    .leaderboard-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        border-bottom: 3px solid var(--gold);
        padding: 60px 0 45px;
        color: #FFFFFF;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .leaderboard-hero::before {
        content: "تقوى";
        position: absolute;
        right: -30px;
        top: -40px;
        font-family: var(--font-arabic);
        font-size: 16rem;
        color: rgba(255, 255, 255, 0.03);
        pointer-events: none;
        user-select: none;
    }
    .ayah-quote {
        font-family: var(--font-arabic);
        font-size: 1.5rem;
        color: var(--gold-light);
        margin-bottom: 12px;
        letter-spacing: 0.02em;
    }
    .ayah-trans {
        font-size: 0.86rem;
        color: #C3DDD2;
        font-style: italic;
        margin-bottom: 18px;
    }
    .hero-title {
        font-family: var(--font-serif);
        font-size: 2.4rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        margin-bottom: 8px;
    }
    .hero-title span {
        color: var(--gold);
    }
    .hero-desc {
        color: #D3E6DE;
        font-size: 0.96rem;
        max-width: 680px;
        margin: 0 auto 24px;
        line-height: 1.5;
    }

    /* Role Filter Pills */
    .filter-pills {
        display: inline-flex;
        background: rgba(3, 37, 28, 0.6);
        border: 1.5px solid var(--gold);
        border-radius: var(--radius-pill);
        padding: 4px;
        gap: 4px;
        backdrop-filter: blur(8px);
    }
    .filter-pill {
        padding: 8px 22px;
        border-radius: var(--radius-pill);
        font-size: 0.85rem;
        font-weight: 700;
        color: #E2EEE8;
        text-decoration: none !important;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .filter-pill:hover {
        background: rgba(201, 163, 90, 0.2);
        color: #FFFFFF;
    }
    .filter-pill.active {
        background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
        color: var(--primary-dark) !important;
        box-shadow: 0 4px 12px rgba(201, 163, 90, 0.4);
    }

    /* Top 3 Podium */
    .podium-container {
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 20px;
        margin: 45px auto 40px;
        max-width: 860px;
        padding: 0 15px;
    }
    .podium-card {
        background: #FFFFFF;
        border-radius: 16px;
        text-align: center;
        padding: 24px 16px 20px;
        box-shadow: 0 10px 30px rgba(6, 61, 46, 0.1);
        border: 2px solid var(--border);
        flex: 1;
        transition: transform 0.25s ease;
        position: relative;
    }
    .podium-card:hover {
        transform: translateY(-4px);
    }
    .podium-card.rank-1 {
        border-color: var(--gold);
        background: linear-gradient(180deg, #FFFDF8 0%, #FFFFFF 100%);
        box-shadow: 0 16px 40px rgba(201, 163, 90, 0.25);
        padding-top: 32px;
        transform: scale(1.04);
        z-index: 2;
    }
    .podium-card.rank-1:hover {
        transform: scale(1.04) translateY(-4px);
    }
    .podium-crown {
        font-size: 2.2rem;
        position: absolute;
        top: -24px;
        left: 50%;
        transform: translateX(-50%);
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
    }
    .podium-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        margin: 0 auto 12px;
        overflow: hidden;
        border: 3px solid var(--gold);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        background: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: var(--gold-light);
        font-weight: 800;
    }
    .podium-card.rank-1 .podium-avatar {
        width: 84px;
        height: 84px;
        border-width: 3.5px;
        border-color: var(--gold);
    }
    .podium-name {
        font-family: var(--font-serif);
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--ink);
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .podium-role-badge {
        display: inline-block;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        padding: 3px 10px;
        border-radius: var(--radius-pill);
        margin-bottom: 12px;
    }
    .role-student {
        background: #FFF8E7;
        color: #9F7E3A;
        border: 1px solid var(--gold);
    }
    .role-teacher {
        background: #EAF7EE;
        color: #1F7A3F;
        border: 1px solid #77C794;
    }
    .podium-coins {
        font-size: 1.35rem;
        font-weight: 900;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .podium-tier {
        font-size: 0.76rem;
        font-weight: 700;
        color: var(--muted);
        margin-top: 4px;
    }

    /* Leaderboard Table */
    .table-card {
        background: #FFFFFF;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(6, 61, 46, 0.08);
        border: 1.5px solid var(--border);
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: 50px;
    }
    .leaderboard-table {
        width: 100%;
        border-collapse: collapse;
    }
    .leaderboard-table th {
        background: var(--primary-surface);
        color: var(--primary-dark);
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        padding: 16px 20px;
        border-bottom: 1.5px solid var(--border);
    }
    .leaderboard-table td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-light);
        vertical-align: middle;
        font-size: 0.92rem;
    }
    .leaderboard-table tr:hover {
        background: rgba(201, 163, 90, 0.04);
    }
    .rank-number {
        font-family: var(--font-sans);
        font-weight: 800;
        font-size: 1rem;
        color: var(--muted);
        width: 48px;
    }
    .user-cell {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .user-avatar-sm {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--gold-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.95rem;
        border: 1.5px solid var(--gold);
        flex-shrink: 0;
    }
    .user-info strong {
        display: block;
        color: var(--ink);
        font-size: 0.95rem;
    }
    .user-info small {
        color: var(--muted);
        font-size: 0.78rem;
    }
    .coin-val {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--primary);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .tier-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: var(--radius-pill);
        border: 1px solid transparent;
    }

    /* Sticky My Rank Bar */
    .my-rank-banner {
        position: sticky;
        bottom: 20px;
        z-index: 99;
        margin-top: -30px;
    }
    .my-rank-card {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border: 2px solid var(--gold);
        border-radius: var(--radius-pill);
        padding: 12px 28px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .my-rank-card .badge-gold {
        background: var(--gold);
        color: var(--primary-dark);
        padding: 4px 14px;
        border-radius: var(--radius-pill);
        font-weight: 800;
        font-size: 0.88rem;
    }

    /* Ways to Earn Cards */
    .earn-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin: 40px 0 60px;
    }
    .earn-card {
        background: #FFFFFF;
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 18px;
        text-align: center;
        box-shadow: 0 4px 16px rgba(6, 61, 46, 0.05);
        transition: transform 0.2s ease;
    }
    .earn-card:hover {
        transform: translateY(-3px);
        border-color: var(--gold);
    }
    .earn-icon {
        font-size: 2.2rem;
        margin-bottom: 10px;
    }
    .earn-title {
        font-weight: 800;
        font-size: 0.96rem;
        color: var(--ink);
        margin-bottom: 6px;
    }
    .earn-reward {
        display: inline-block;
        background: rgba(201, 163, 90, 0.15);
        border: 1px solid var(--gold);
        color: #9F7E3A;
        font-weight: 800;
        font-size: 0.82rem;
        padding: 4px 12px;
        border-radius: var(--radius-pill);
        margin-bottom: 8px;
    }
    .earn-desc {
        font-size: 0.8rem;
        color: var(--muted);
        line-height: 1.4;
    }

    @media (max-width: 768px) {
        .podium-container {
            flex-direction: column;
            align-items: stretch;
            padding: 0 10px;
        }
        .podium-card.rank-1 {
            order: -1;
            transform: none;
        }
        .my-rank-banner {
            bottom: calc(72px + env(safe-area-inset-bottom, 0px)) !important;
            margin-top: -20px;
        }
        .my-rank-card {
            border-radius: 16px;
            text-align: center;
            justify-content: center;
        }
        .leaderboard-table th, .leaderboard-table td {
            padding: 12px 10px;
            font-size: 0.82rem;
        }
        .leaderboard-table {
            min-width: 480px;
        }
    }
</style>
@endsection

@section('content')

<!-- Hero Section -->
<section class="leaderboard-hero">
    <div class="container">
        <div class="ayah-quote">وَفِي ذَٰلِكَ فَلْيَتَنَافَسِ الْمُتَنَافِسُونَ</div>
        <div class="ayah-trans">“And for this let the competitors compete.” — Surah Al-Mutaffifin [83:26]</div>
        <h1 class="hero-title">Taqwa Coins <span>Leaderboard</span></h1>
        <p class="hero-desc">
            Honoring Seekers of Knowledge (<em>Talib-ul-Ilm</em>) striving with excellence in Taleem, Tarbiyah, and Tazkiyah.
        </p>

        <!-- Roster Badge -->
        <div class="d-inline-flex align-items-center mt-3 px-3 py-1 rounded-pill" style="background: rgba(201, 163, 90, 0.2); border: 1px solid #C9A35A; color: #FAF9F5; font-size: 0.85rem; font-weight: 600;">
            <span>📖 Seekers of Knowledge (Talib-ul-Ilm) Roster &bull; Total Coins: 🪙 {{ number_format($stats['total_coins']) }}</span>
        </div>
    </div>
</section>

<div class="container my-5">

    <!-- Top 3 Podium -->
    @if($top3->count() > 0)
    <div class="podium-container">
        {{-- 2nd Place --}}
        @if($top3->count() >= 2)
            @php $p2 = $top3->get(1); @endphp
            <div class="podium-card rank-2">
                <div class="podium-crown">🥈</div>
                <div class="podium-avatar" style="border-color: #A0AEC0;">
                    {{ strtoupper(substr($p2->name, 0, 1)) }}
                </div>
                <h4 class="podium-name" title="{{ $p2->name }}">{{ $p2->name }}</h4>
                <span class="podium-role-badge role-student">
                    Talib-ul-Ilm
                </span>
                <div class="podium-coins">🪙 {{ number_format($p2->coins_balance) }}</div>
                <div class="podium-tier">{{ $p2->tier['icon'] }} {{ $p2->tier['name'] }}</div>
            </div>
        @endif

        {{-- 1st Place (Champion) --}}
        @php $p1 = $top3->get(0); @endphp
        <div class="podium-card rank-1">
            <div class="podium-crown">👑</div>
            <div class="podium-avatar">
                {{ strtoupper(substr($p1->name, 0, 1)) }}
            </div>
            <h4 class="podium-name" style="font-size: 1.3rem;" title="{{ $p1->name }}">{{ $p1->name }}</h4>
            <span class="podium-role-badge role-student">
                Talib-ul-Ilm
            </span>
            <div class="podium-coins" style="font-size: 1.6rem; color: #9F7E3A;">
                🪙 {{ number_format($p1->coins_balance) }}
            </div>
            <div class="podium-tier" style="font-size: 0.85rem; font-weight: 800; color: #9F7E3A;">
                {{ $p1->tier['icon'] }} {{ $p1->tier['name'] }} ({{ $p1->tier['arabic'] }})
            </div>
        </div>

        {{-- 3rd Place --}}
        @if($top3->count() >= 3)
            @php $p3 = $top3->get(2); @endphp
            <div class="podium-card rank-3">
                <div class="podium-crown">🥉</div>
                <div class="podium-avatar" style="border-color: #CD7F32;">
                    {{ strtoupper(substr($p3->name, 0, 1)) }}
                </div>
                <h4 class="podium-name" title="{{ $p3->name }}">{{ $p3->name }}</h4>
                <span class="podium-role-badge role-student">
                    Talib-ul-Ilm
                </span>
                <div class="podium-coins">🪙 {{ number_format($p3->coins_balance) }}</div>
                <div class="podium-tier">{{ $p3->tier['icon'] }} {{ $p3->tier['name'] }}</div>
            </div>
        @endif
    </div>
    @endif

    <!-- Leaderboard Table (Ranks 4+) -->
    <div class="table-card">
        <table class="leaderboard-table">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">Rank</th>
                    <th>Participant</th>
                    <th>Role</th>
                    <th>Islamic Tier</th>
                    <th style="text-align: right;">Taqwa Coins</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rankings as $user)
                <tr style="{{ (Auth::check() && Auth::id() === $user->id) ? 'background: rgba(201, 163, 90, 0.12); font-weight: 700;' : '' }}">
                    <td style="text-align: center;">
                        <span class="rank-number">#{{ $user->rank }}</span>
                    </td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="user-info">
                                <strong>{{ $user->name }} @if(Auth::check() && Auth::id() === $user->id) <span style="color: var(--gold);">(You)</span> @endif</strong>
                                <small>{{ substr($user->email, 0, 3) }}***{{ substr($user->email, strpos($user->email, '@')) }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="podium-role-badge role-student" style="margin: 0;">
                            Talib-ul-Ilm
                        </span>
                    </td>
                    <td>
                        <span class="tier-badge" style="background: rgba(6, 61, 46, 0.06); color: {{ $user->tier['badge_color'] }};">
                            <span>{{ $user->tier['icon'] }}</span> {{ $user->tier['name'] }}
                        </span>
                    </td>
                    <td style="text-align: right;">
                        <span class="coin-val">🪙 {{ number_format($user->coins_balance) }}</span>
                    </td>
                </tr>
                @empty
                    @if($top3->count() === 0)
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--muted);">
                            No participants found for this category yet.
                        </td>
                    </tr>
                    @endif
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Sticky User Standing Bar (If Logged In) -->
    @if($myRankInfo)
    <div class="my-rank-banner">
        <div class="my-rank-card">
            <div class="d-flex align-items-center" style="gap: 12px;">
                <span style="font-size: 1.4rem;">🪙</span>
                <div>
                    <strong style="display: block; font-size: 1rem; color: #FFFFFF;">{{ $myRankInfo['user']->name }}</strong>
                    <small style="color: var(--gold-light);">Role: Talib-ul-Ilm</small>
                </div>
            </div>
            <div class="d-flex align-items-center" style="gap: 18px;">
                <div>
                    <small style="display: block; font-size: 0.72rem; text-transform: uppercase; color: #C3DDD2; letter-spacing: 0.08em;">Rank Standing</small>
                    <span class="badge-gold">#{{ $myRankInfo['rank'] ?: 'Unranked' }}</span>
                </div>
                <div>
                    <small style="display: block; font-size: 0.72rem; text-transform: uppercase; color: #C3DDD2; letter-spacing: 0.08em;">Coins Balance</small>
                    <strong style="color: #FFFFFF; font-size: 1.15rem;">🪙 {{ number_format($myRankInfo['balance']) }}</strong>
                </div>
                <div>
                    <small style="display: block; font-size: 0.72rem; text-transform: uppercase; color: #C3DDD2; letter-spacing: 0.08em;">Honorific Tier</small>
                    <span style="color: var(--gold-light); font-weight: 700; font-size: 0.9rem;">
                        {{ $myRankInfo['tier']['icon'] }} {{ $myRankInfo['tier']['name'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- How Students Earn Taqwa Coins -->
    <div style="margin-top: 60px;">
        <div class="text-center mb-4">
            <h3 style="font-family: var(--font-serif); font-size: 1.8rem; font-weight: 800; color: var(--primary);">
                How Students Earn <span>Taqwa Coins</span>
            </h3>
            <p style="color: var(--muted); font-size: 0.92rem; max-width: 600px; margin: 0 auto;">
                Taqwa Coins celebrate steadfastness in knowledge, recitation, and spiritual dedication for our Talib-ul-Ilm.
            </p>
        </div>

        <div class="earn-grid">
            <div class="earn-card">
                <div class="earn-icon">📅</div>
                <div class="earn-title">Daily Login Streak</div>
                <div class="earn-reward">+5 Coins / Day</div>
                <p class="earn-desc">Maintain consecutive daily presence in the Sanctuary.</p>
            </div>
            <div class="earn-card">
                <div class="earn-icon">🕌</div>
                <div class="earn-title">Halqa Attendance</div>
                <div class="earn-reward">+15 Coins / Live Halqa</div>
                <p class="earn-desc">Attend and participate actively in scheduled live classrooms.</p>
            </div>
            <div class="earn-card">
                <div class="earn-icon">📖</div>
                <div class="earn-title">Hifz Memorization Milestones</div>
                <div class="earn-reward">+50 Coins / Milestone</div>
                <p class="earn-desc">Complete new Sabaq portions and quarterly Manzil cycles.</p>
            </div>
            <div class="earn-card">
                <div class="earn-icon">📿</div>
                <div class="earn-title">Zikr & Durood Sanctuary</div>
                <div class="earn-reward">+10 Coins / 100 Counts</div>
                <p class="earn-desc">Contribute to the global collective Durood & Zikr tally.</p>
            </div>
            <div class="earn-card">
                <div class="earn-icon">🏆</div>
                <div class="earn-title">Admin Merit & Extra Tasks</div>
                <div class="earn-reward">Up to +100 Coins</div>
                <p class="earn-desc">Awarded directly by Academic Administrators for exceptional performance, competitions, and voluntary community service.</p>
            </div>
        </div>
    </div>

</div>

@endsection
