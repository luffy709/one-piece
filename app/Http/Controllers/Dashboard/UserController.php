<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\UserStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->select('id', 'name', 'status')->get()->filter(function (User $user) {
            if (auth()->user()->hasRole('moderator')) return $user->hasRole('user');
            if (auth()->user()->hasRole('super-moderator')) return $user->hasAnyRole(['user', 'moderator']);
            if (auth()->user()->hasRole('administrator')) return $user->hasAnyRole(['user', 'moderator', 'super-moderator']);
            return $user;
        });

        return view('dashboard.user.index')->with([
            'users' => $users,
            'roles' => ['administrator', 'super moderator', 'moderator', 'user'],
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->role);
        return redirect()->back()->with(['message' => 'user.role-change.success']);
    }

    public function activate(User $user)
    {
        $user->update(['status' => UserStatus::$ACTIVE]);
        $user->syncRoles('user');
        return redirect()->back()->with(['message' => 'user.active.success']);
    }

    public function banForum(User $user)
    {
        $user->update(['status' => UserStatus::$BAN_FORUM]);
        $user->syncRoles('user ban forum');
        return redirect()->back()->with(['message' => 'user.ban.success']);
    }

    public function banChat(User $user)
    {
        $user->update(['status' => UserStatus::$BAN_CHAT]);
        $user->syncRoles('user ban chat');
        return redirect()->back()->with(['message' => 'user.ban.success']);
    }

    public function ban(User $user)
    {
        $user->update(['status' => UserStatus::$ARCHIVED]);
        $user->syncRoles('user ban');
        return redirect()->back()->with(['message' => 'user.ban.success']);
    }
}
