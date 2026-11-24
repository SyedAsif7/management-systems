<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\CoinTransaction;
use App\Services\CoinService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('teamSA');
    }

    /**
     * Admin Coins Oversight & Management Console
     */
    public function index(Request $request)
    {
        $roleFilter = $request->get('role', 'all');
        $search = $request->get('search', '');

        $query = User::select('id', 'name', 'username', 'email', 'user_type', 'photo', 'coins_balance')
            ->whereIn('user_type', ['student', 'teacher']);

        if ($roleFilter === 'student') {
            $query->where('user_type', 'student');
        } elseif ($roleFilter === 'teacher') {
            $query->where('user_type', 'teacher');
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%");
            });
        }

        $users = $query->orderByDesc('coins_balance')
            ->orderBy('name', 'asc')
            ->paginate(25)
            ->appends($request->query());

        // Decorate with Tier Info
        foreach ($users as $u) {
            $u->tier = CoinService::getUserTier($u->coins_balance);
        }

        $overview = CoinService::getAdminOverview();
        $taskRules = CoinService::getTaskRules();

        $recentTransactions = CoinTransaction::with('user')
            ->orderByDesc('id')
            ->take(15)
            ->get();

        // Roster for Quick Award Dropdown
        $allUsersList = User::select('id', 'name', 'email', 'user_type', 'coins_balance')
            ->whereIn('user_type', ['student', 'teacher'])
            ->orderBy('name', 'asc')
            ->get();

        return view('pages.support_team.coins.index', compact(
            'users', 'overview', 'taskRules', 'recentTransactions', 'roleFilter', 'search', 'allUsersList'
        ));
    }

    /**
     * Admin Award, Deduct, or Set Coins for a User
     */
    public function adjust(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer|min:1',
            'action' => 'required|in:award,deduct,set',
            'task_reason' => 'required|string|max:255',
        ]);

        $targetUser = User::findOrFail($request->user_id);
        $amount = (int) $request->amount;
        $action = $request->action;
        $reason = trim($request->task_reason);

        $tx = CoinService::adminAdjust($targetUser, $amount, $action, $reason, Auth::user());

        $actionVerb = $action === 'set' ? "set to {$amount}" : ($action === 'deduct' ? "deducted {$amount}" : "awarded {$amount}");
        $msg = "Successfully {$actionVerb} Taqwa Coins for {$targetUser->name} ({$targetUser->user_type}). New Balance: {$targetUser->coins_balance} Coins.";

        if ($request->ajax()) {
            return response()->json([
                'ok' => true,
                'msg' => $msg,
                'new_balance' => $targetUser->coins_balance,
            ]);
        }

        return redirect()->back()->with('flash_success', $msg);
    }

    /**
     * Update Standard Task Reward Settings
     */
    public function updateSettings(Request $request)
    {
        $rules = [
            'task_coin_daily_streak' => $request->input('task_coin_daily_streak', 5),
            'task_coin_student_halqa' => $request->input('task_coin_student_halqa', 15),
            'task_coin_teacher_halqa' => $request->input('task_coin_teacher_halqa', 25),
            'task_coin_hifz_milestone' => $request->input('task_coin_hifz_milestone', 50),
            'task_coin_zikr_century' => $request->input('task_coin_zikr_century', 10),
            'task_coin_exam_excellence' => $request->input('task_coin_exam_excellence', 100),
            'task_coin_volunteer_task' => $request->input('task_coin_volunteer_task', 50),
        ];

        CoinService::saveTaskRules($rules);

        return redirect()->back()->with('flash_success', 'Taqwa Coin Task Reward Rules updated successfully!');
    }

    /**
     * View Audit Transaction History
     */
    public function history(Request $request, $user_id = null)
    {
        $query = CoinTransaction::with('user');

        if ($user_id) {
            $query->where('user_id', $user_id);
            $selectedUser = User::find($user_id);
        } else {
            $selectedUser = null;
        }

        $transactions = $query->orderByDesc('id')->paginate(30);

        return view('pages.support_team.coins.history', compact('transactions', 'selectedUser'));
    }
}
