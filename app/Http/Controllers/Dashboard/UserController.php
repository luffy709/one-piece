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
        $activeUsers = User::query()->where('status', UserStatus::$ACTIVE);
        $banForumUsers = User::query()->where('status', UserStatus::$BAN_FORUM);
        $banChatUsers = User::query()->where('status', UserStatus::$BAN_CHAT);
        $banUsers = User::query()->where('status', UserStatus::$ARCHIVED);

        if (auth()->user()->hasRole('moderator')) {
            $activeUsers = $activeUsers->role('user')->get();
            $banForumUsers = $banForumUsers->role('user')->get();
            $banChatUsers = $banChatUsers->role('user')->get();
            $banUsers = $banUsers->role('user')->get();
        }

        if (auth()->user()->hasRole('super moderator')) {
            $activeUsers = $activeUsers->role(['user', 'moderator'])->get();
            $banForumUsers = $banForumUsers->role(['user', 'moderator'])->get();
            $banChatUsers = $banChatUsers->role(['user', 'moderator'])->get();
            $banUsers = $banUsers->role(['user', 'moderator'])->get();
        }

        if (auth()->user()->hasRole('administrator')) {
            $activeUsers = $activeUsers->role(['user', 'moderator', 'super moderator'])->get();
            $banForumUsers = $banForumUsers->role(['user', 'moderator', 'super moderator'])->get();
            $banChatUsers = $banChatUsers->role(['user', 'moderator', 'super moderator'])->get();
            $banUsers = $banUsers->role(['user', 'moderator', 'super moderator'])->get();
        }

        if (auth()->user()->hasRole('super administrator')) {
            $activeUsers = $activeUsers->get();
            $banForumUsers = $banForumUsers->get();
            $banChatUsers = $banChatUsers->get();
            $banUsers = $banUsers->get();
        }


        return view('dashboard.user.index')->with([
            'activeUsers' => $activeUsers,
            'banForumUsers' => $banForumUsers,
            'banChatUsers' => $banChatUsers,
            'banUsers' => $banUsers,
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
