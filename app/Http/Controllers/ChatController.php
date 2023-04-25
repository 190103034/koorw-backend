<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Block;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\House;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    public function rooms(Request $request): Response
    {
        $user = Auth()->user();

        $houseId = $user->house->id;
        $blockId = $user->block_id;

        $chats = ChatRoom::where(function ($query) use ($houseId) {
            $query->where('chattable_type', House::class)
                ->where('chattable_id', $houseId);
        })->orWhere(function ($query) use ($blockId) {
            $query->where('chattable_type', Block::class)
                ->where('chattable_id', $blockId);
        })
            ->get();

        return response($chats);
    }

    public function messages(Request $request, $room_id): Response
    {
        $room = ChatRoom::find($room_id);

        $user = Auth()->user();

        $houseId = $user->house->id;
        $blockId = $user->block_id;

        if (($room->chattable_type == House::class && $room->chattable_id != $houseId)
            || ($room->chattable_type == Block::class && $room->chattable_id != $blockId)
        ) {
            return response(['Unauthorized access.'], 400);
        }

        $messages = ChatMessage::where('chat_room_id', $room_id)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();

        return response($messages);
    }

    public function message(Request $request, $room_id)
    {
        $message = new ChatMessage();
        $message->user_id = Auth()->user()->id;
        $message->chat_room_id = $room_id;
        $message->message = $request->message;
        $message->save();

        broadcast(new NewMessage($message))->toOthers();

        return response($message);
    }
}
