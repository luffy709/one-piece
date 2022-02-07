<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(Room $room): View
    {
        $rooms = Room::all();

        return view('room.show')->with([
            'room' => $room->title ? $room : Room::first(),
            'rooms' => $rooms,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $message = new RoomMessage;

        $message->body = $request->body;
        $message->room_id = $request->room;
        $message->user_id = auth()->user()->id;

        $message->save();

        return redirect()->back();
    }
}
