<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Contracts\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        $rooms = Room::all();

        return view('room.show')->with([
            'room' => Room::first(),
            'rooms' => $rooms,
        ]);
    }
}
