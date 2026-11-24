@extends('layouts.master')
@section('page_title', 'Taqwa Coins Transaction Ledger')
@section('content')

<style>
    .badge-role-student {
        background: #FFF8E7;
        color: #9F7E3A;
        border: 1px solid #C9A35A;
        padding: 3px 8px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.75rem;
    }
    .badge-role-teacher {
        background: #EAF7EE;
        color: #1F7A3F;
        border: 1px solid #77C794;
        padding: 3px 8px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.75rem;
    }
    .coin-badge-earn {
        background: #EAF7EE;
        color: #1F7A3F;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 12px;
        border: 1px solid #A3D9B5;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .coin-badge-redeem {
        background: #FDF2F2;
        color: #C53030;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 12px;
        border: 1px solid #F5C6CB;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
</style>

<div class="card">
    <div class="card-header header-elements-inline" style="background: #063D2E; color: #FFFFFF; border-bottom: 2px solid #C9A35A;">
        <h5 class="card-title font-weight-bold" style="color: #FFFFFF;">
            <i class="icon-history mr-2" style="color: #C9A35A;"></i> 
            Taqwa Coins Transaction Ledger 
            @if($selectedUser)
                — <span style="color: #DFBA6B;">{{ $selectedUser->name }} ({{ ucfirst($selectedUser->user_type) }})</span>
            @endif
        </h5>
        <div class="header-elements">
            <a href="{{ route('coins.admin_index') }}" class="btn btn-sm btn-outline-light font-weight-bold mr-2">
                <i class="icon-arrow-left52 mr-1"></i> Back to Coins Console
            </a>
            @if($selectedUser)
                <a href="{{ route('coins.admin_history') }}" class="btn btn-sm btn-gold font-weight-bold">
                    <i class="icon-list mr-1"></i> View All Users
                </a>
            @endif
        </div>
    </div>

    <div class="card-body">

        @if($selectedUser)
            <div class="alert alert-info d-flex align-items-center justify-content-between p-3 mb-4" style="background: #FAF9F5; border: 1.5px solid #C9A35A; border-radius: 8px;">
                <div class="d-flex align-items-center">
                    <img src="{{ $selectedUser->photo ? asset('storage/'.$selectedUser->photo) : asset('assets/images/user.png') }}" class="rounded-circle mr-3" style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #C9A35A;">
                    <div>
                        <div class="font-weight-bold" style="color: #063D2E; font-size: 1.1rem;">{{ $selectedUser->name }}</div>
                        <div class="text-muted small">
                            <span class="mr-2"><i class="icon-mail5 mr-1"></i>{{ $selectedUser->email }}</span>
                            <span class="{{ $selectedUser->user_type === 'teacher' ? 'badge-role-teacher' : 'badge-role-student' }}">
                                {{ $selectedUser->user_type === 'teacher' ? 'Ustadh / Scholar' : 'Student / Seeker' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="small text-muted font-weight-bold text-uppercase">Current Balance</div>
                    <div style="font-size: 1.4rem; font-weight: 800; color: #063D2E;">
                        🪙 {{ number_format($selectedUser->coins_balance) }} <span style="font-size: 0.9rem; color: #C9A35A;">Coins</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead style="background: #063D2E; color: #FFFFFF;">
                    <tr>
                        <th style="width: 60px;">#ID</th>
                        <th style="width: 160px;">Timestamp</th>
                        <th>User</th>
                        <th style="width: 120px;">Role</th>
                        <th style="width: 140px;">Type &amp; Amount</th>
                        <th style="width: 150px;">Source</th>
                        <th>Task / Reason Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $t)
                        <tr>
                            <td class="font-weight-bold text-muted">#{{ $t->id }}</td>
                            <td class="small text-muted">{{ $t->created_at ? $t->created_at->format('M d, Y h:i A') : '-' }}</td>
                            <td>
                                @if($t->user)
                                    <a href="{{ route('coins.admin_history', $t->user->id) }}" class="font-weight-bold" style="color: #063D2E;">
                                        {{ $t->user->name }}
                                    </a>
                                    <div class="small text-muted">{{ $t->user->email }}</div>
                                @else
                                    <span class="text-muted">User #{{ $t->user_id }}</span>
                                @endif
                            </td>
                            <td>
                                @if($t->user)
                                    <span class="{{ $t->user->user_type === 'teacher' ? 'badge-role-teacher' : 'badge-role-student' }}">
                                        {{ $t->user->user_type === 'teacher' ? 'Ustadh' : 'Student' }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($t->type === 'earn')
                                    <span class="coin-badge-earn">+{{ number_format($t->amount) }} 🪙</span>
                                @else
                                    <span class="coin-badge-redeem">-{{ number_format($t->amount) }} 🪙</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-light" style="border: 1px solid #D5D0C5; font-size: 0.8rem; text-transform: uppercase;">
                                    {{ str_replace('_', ' ', $t->source) }}
                                </span>
                            </td>
                            <td>
                                <span style="color: #14261F;">{{ $t->description }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="icon-coins icon-2x d-block mb-2 text-muted"></i>
                                No coin transactions logged yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $transactions->links() }}
        </div>

    </div>
</div>

@endsection
