@extends('layouts.master')
@section('page_title', 'Taqwa Coins Management & Award Console')
@section('content')

<style>
    .coin-kpi-card {
        border-radius: 12px;
        border: 1px solid var(--border, #E5E0D5);
        background: #FFFFFF;
        padding: 20px;
        box-shadow: 0 4px 14px rgba(6, 61, 46, 0.05);
        display: flex;
        align-items: center;
        gap: 16px;
        transition: transform 0.2s ease;
    }
    .coin-kpi-card:hover {
        transform: translateY(-2px);
    }
    .coin-kpi-icon {
        width: 54px;
        height: 54px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        background: rgba(201, 163, 90, 0.12);
        border: 1.5px solid #C9A35A;
        flex-shrink: 0;
    }
    .coin-kpi-val {
        font-size: 1.5rem;
        font-weight: 800;
        color: #063D2E;
        line-height: 1.2;
    }
    .coin-kpi-lbl {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #5F7369;
        font-weight: 700;
    }

    .badge-role-student {
        background: #FFF8E7;
        color: #9F7E3A;
        border: 1px solid #C9A35A;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.75rem;
    }
    .badge-role-teacher {
        background: #EAF7EE;
        color: #1F7A3F;
        border: 1px solid #77C794;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.75rem;
    }
    .coin-pill-gold {
        background: rgba(201, 163, 90, 0.15);
        border: 1.5px solid #C9A35A;
        color: #063D2E;
        font-weight: 800;
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
</style>

<div class="card">
    <div class="card-header header-elements-inline" style="background: #063D2E; color: #FFFFFF; border-bottom: 2px solid #C9A35A;">
        <h5 class="card-title font-weight-bold" style="color: #FFFFFF;">
            <i class="icon-coins mr-2" style="color: #C9A35A;"></i> Taqwa Coins Management &amp; Oversight
        </h5>
        <div class="header-elements">
            <button type="button" class="btn btn-sm btn-gold mr-2 font-weight-bold" data-toggle="modal" data-target="#awardCoinModal">
                <i class="icon-plus-circle2 mr-1"></i> Award / Set Coins
            </button>
            <button type="button" class="btn btn-sm btn-outline-gold mr-2 font-weight-bold" data-toggle="modal" data-target="#taskSettingsModal">
                <i class="icon-cog mr-1"></i> Task Reward Rules
            </button>
            <a href="{{ route('storefront.leaderboard') }}" target="_blank" class="btn btn-sm btn-outline-light font-weight-bold">
                <i class="icon-trophy3 mr-1" style="color: #C9A35A;"></i> View Leaderboard ↗
            </a>
        </div>
    </div>

    <div class="card-body">

        @if(session('flash_success'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">Success!</span> {{ session('flash_success') }}
            </div>
        @endif

        {{-- 4 KPI Overview Cards --}}
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="coin-kpi-card">
                    <div class="coin-kpi-icon">🪙</div>
                    <div>
                        <div class="coin-kpi-val">{{ number_format($overview['total_circulation']) }}</div>
                        <div class="coin-kpi-lbl">Total Circulation</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="coin-kpi-card">
                    <div class="coin-kpi-icon">📖</div>
                    <div>
                        <div class="coin-kpi-val">{{ number_format($overview['student_coins']) }}</div>
                        <div class="coin-kpi-lbl">Student Pool</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="coin-kpi-card">
                    <div class="coin-kpi-icon">🎁</div>
                    <div>
                        <div class="coin-kpi-val">{{ number_format($overview['total_redeemed']) }}</div>
                        <div class="coin-kpi-lbl">Total Redeemed</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="coin-kpi-card">
                    <div class="coin-kpi-icon">📜</div>
                    <div>
                        <div class="coin-kpi-val">{{ number_format($overview['transactions_count']) }}</div>
                        <div class="coin-kpi-lbl">Total Transactions</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filter & Search Toolbar --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3 p-3" style="background: #F8F9FA; border-radius: 8px; border: 1px solid #E5E0D5;">
            <div class="d-flex align-items-center mr-2 mb-2 mb-md-0">
                <span class="badge px-3 py-2" style="background: #063D2E; color: #DFBA6B; font-size: 0.85rem; font-weight: 700;">
                    <i class="icon-graduation2 mr-1"></i> Student Seekers (Talib-ul-Ilm) Roster
                </span>
            </div>

            <form method="GET" action="{{ route('coins.admin_index') }}" class="form-inline">
                <input type="hidden" name="role" value="{{ $roleFilter }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by name, email..." value="{{ $search }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-sm btn-dark"><i class="icon-search4"></i></button>
                        @if($search)
                            <a href="{{ route('coins.admin_index', ['role' => $roleFilter]) }}" class="btn btn-sm btn-light"><i class="icon-cross2"></i></a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- Users & Coins Table --}}
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead style="background: #063D2E; color: #FFFFFF;">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>User / Scholar</th>
                        <th>Role</th>
                        <th>Islamic Honorific Tier</th>
                        <th>Current Balance</th>
                        <th class="text-center" style="width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $u)
                    <tr>
                        <td><strong>{{ $users->firstItem() + $index }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mr-2 rounded-circle bg-dark text-warning d-flex align-items-center justify-content-center font-weight-bold" style="width: 36px; height: 36px; border: 1.5px solid #C9A35A;">
                                    {{ strtoupper(substr($u->name, 0, 1)) }}
                                </div>
                                <div>
                                    <strong class="d-block text-dark">{{ $u->name }}</strong>
                                    <small class="text-muted">{{ $u->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="{{ $u->user_type === 'teacher' ? 'badge-role-teacher' : 'badge-role-student' }}">
                                {{ $u->user_type === 'teacher' ? 'Ustadh / Scholar' : 'Talib-ul-Ilm' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge" style="background: rgba(6, 61, 46, 0.08); color: {{ $u->tier['badge_color'] }}; font-weight: 700;">
                                {{ $u->tier['icon'] }} {{ $u->tier['name'] }}
                            </span>
                        </td>
                        <td>
                            <span class="coin-pill-gold">
                                🪙 {{ number_format($u->coins_balance) }} Coins
                            </span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-xs btn-outline-dark font-weight-bold open-adjust-btn"
                                    data-id="{{ $u->id }}"
                                    data-name="{{ $u->name }}"
                                    data-role="{{ $u->user_type }}"
                                    data-balance="{{ $u->coins_balance }}">
                                <i class="icon-coins mr-1 text-warning"></i> Set / Award
                            </button>
                            <a href="{{ route('coins.admin_history', $u->id) }}" class="btn btn-xs btn-light" title="View Transaction Ledger">
                                <i class="icon-history"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted p-4">
                            No users found matching the selected criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-between align-items-center">
            <span class="text-muted">Showing {{ $users->firstItem() ?: 0 }} to {{ $users->lastItem() ?: 0 }} of {{ $users->total() }} participants</span>
            {{ $users->links() }}
        </div>

    </div>
</div>

{{-- MODAL 1: Award / Set Coins --}}
<div class="modal fade" id="awardCoinModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 14px; overflow: hidden; border: 2px solid #C9A35A;">
            <div class="modal-header" style="background: #063D2E; color: #FFFFFF;">
                <h5 class="modal-title font-weight-bold" style="color: #FFFFFF;">
                    <i class="icon-coins text-warning mr-2"></i> Award / Set Taqwa Coins
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{ route('coins.admin_adjust') }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{-- User Selector --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Select Student (Talib-ul-Ilm):</label>
                        <select name="user_id" id="modalUserId" class="form-control select-search" required>
                            <option value="">-- Choose Student --</option>
                            @foreach($allUsersList as $userItem)
                                <option value="{{ $userItem->id }}" data-balance="{{ $userItem->coins_balance }}" data-name="{{ $userItem->name }}" data-role="{{ $userItem->user_type }}">
                                    {{ $userItem->name }} (Current: 🪙 {{ $userItem->coins_balance }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Action Type --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Action Type:</label>
                        <div class="d-flex" style="gap: 15px;">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="actAward" name="action" value="award" class="custom-control-input" checked>
                                <label class="custom-control-label font-weight-bold text-success" for="actAward">
                                    <i class="icon-plus22"></i> Award Extra Coins (+)
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="actDeduct" name="action" value="deduct" class="custom-control-input">
                                <label class="custom-control-label font-weight-bold text-danger" for="actDeduct">
                                    <i class="icon-minus2"></i> Deduct Coins (-)
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="actSet" name="action" value="set" class="custom-control-input">
                                <label class="custom-control-label font-weight-bold text-primary" for="actSet">
                                    <i class="icon-equalizer2"></i> Set Exact Total (=)
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Coin Amount --}}
                    <div class="form-group">
                        <label class="font-weight-bold" id="amountLabel">Coin Amount to Award:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold text-warning" style="background: #03251C;">🪙</span>
                            </div>
                            <input type="number" name="amount" id="modalAmount" class="form-control font-weight-bold" style="font-size: 1.1rem;" placeholder="e.g. 50" min="1" required>
                        </div>
                    </div>

                    {{-- Task / Extra Reason Presets --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Quick Task Presets:</label>
                        <select id="quickPresetSelect" class="form-control form-control-sm mb-2">
                            <option value="">-- Choose a standard task or type custom below --</option>
                            <option value="Special Qur'an Recitation Competition Winner" data-amt="50">Special Qur'an Recitation Competition Winner (+50)</option>
                            <option value="Excellence in Halqa Mentorship & Teaching" data-amt="50">Excellence in Halqa Mentorship & Teaching (+50)</option>
                            <option value="Halqa Discipline & Punctuality Award" data-amt="25">Halqa Discipline & Punctuality Award (+25)</option>
                            <option value="Top Exam Scorer & Marks Tabulation" data-amt="100">Top Exam Scorer & Marks Tabulation (+100)</option>
                            <option value="Voluntary Community Dawah & Outreach" data-amt="50">Voluntary Community Dawah & Outreach (+50)</option>
                            <option value="Tajweed Oral Examination Distinction" data-amt="40">Tajweed Oral Examination Distinction (+40)</option>
                            <option value="Hifz Quarterly Manzil Cycle Passed" data-amt="75">Hifz Quarterly Manzil Cycle Passed (+75)</option>
                        </select>
                        <label class="font-weight-bold">Task / Adjustment Reason (Required for Ledger):</label>
                        <input type="text" name="task_reason" id="modalTaskReason" class="form-control" placeholder="e.g. Special Qur'an Recitation Competition Winner" required>
                    </div>
                </div>

                <div class="modal-footer" style="background: #F8F9FA;">
                    <button type="button" class="btn btn-light font-weight-bold" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold font-weight-bold">
                        <i class="icon-checkmark4 mr-1"></i> Confirm &amp; Update Ledger
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL 2: Task Coin Reward Rules Settings --}}
<div class="modal fade" id="taskSettingsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 14px; overflow: hidden; border: 2px solid #C9A35A;">
            <div class="modal-header" style="background: #063D2E; color: #FFFFFF;">
                <h5 class="modal-title font-weight-bold" style="color: #FFFFFF;">
                    <i class="icon-cog text-warning mr-2"></i> Configure Standard Task Coin Rules
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{ route('coins.admin_settings') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-muted small mb-3">
                        Set the standard automatic Taqwa Coins awarded for daily spiritual practices, live attendance, and academic milestones across the platform.
                    </p>

                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">📅 Daily Login Streak:</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_daily_streak" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_daily_streak'] }}" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">🕌 Student Halqa Attendance:</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_student_halqa" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_student_halqa'] }}" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">📖 Hifz Milestone Passed:</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_hifz_milestone" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_hifz_milestone'] }}" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">📿 Zikr &amp; Durood Century (100 Recitations):</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_zikr_century" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_zikr_century'] }}" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">🏆 Exam Excellence (≥85% Marks):</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_exam_excellence" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_exam_excellence'] }}" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label font-weight-bold">🤝 Community Volunteer / Extra Task:</label>
                        <div class="col-sm-4">
                            <input type="number" name="task_coin_volunteer_task" class="form-control font-weight-bold" value="{{ $taskRules['task_coin_volunteer_task'] }}" min="1" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="background: #F8F9FA;">
                    <button type="button" class="btn btn-light font-weight-bold" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold font-weight-bold">
                        <i class="icon-checkmark4 mr-1"></i> Save Task Rules
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Row click handler to pre-fill award modal
    document.querySelectorAll('.open-adjust-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const uid = this.dataset.id;
            const selectEl = document.getElementById('modalUserId');
            if (selectEl) {
                selectEl.value = uid;
            }
            $('#awardCoinModal').modal('show');
        });
    });

    // Preset selector handler
    const presetSelect = document.getElementById('quickPresetSelect');
    if (presetSelect) {
        presetSelect.addEventListener('change', function() {
            const val = this.value;
            const amt = this.options[this.selectedIndex].dataset.amt;
            if (val) {
                document.getElementById('modalTaskReason').value = val;
                if (amt) {
                    document.getElementById('modalAmount').value = amt;
                }
            }
        });
    }

    // Radio change handler for label
    const amountLabel = document.getElementById('amountLabel');
    document.querySelectorAll('input[name="action"]').forEach(r => {
        r.addEventListener('change', function() {
            if (this.value === 'set') {
                amountLabel.textContent = 'Set Exact Total Balance To:';
            } else if (this.value === 'deduct') {
                amountLabel.textContent = 'Coin Amount to Deduct:';
            } else {
                amountLabel.textContent = 'Coin Amount to Award:';
            }
        });
    });
});
</script>

@endsection
