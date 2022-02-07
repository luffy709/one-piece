<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomMessage;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = Room::factory(5)->create();

        $user = User::first();

        $rooms->map(function (Room $room) use ($user) {
            RoomMessage::factory(10)->for($room)->for($user)->create();
        });
    }
}
