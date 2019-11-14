<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all()->sortByDesc('created_at');
        return view('messageIndex', compact('messages'));
    }

    public function create()
    {
        $message = new Message();
        return view('createMessage', compact('message'));
    }

    public function store(Request $request)
    {
        $request->merge(['user_id'=> auth()->id()]);
        Message::create($request->all());
        return redirect('/message');
    }

    public function show(Message $message)
    {
        //
    }

    public function edit(Message $message)
    {
        $this->authorize('update', $message);
        return view('editMessage', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $message->update($request->all());
        return redirect('/message');
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);

        $message->delete();
        return redirect('/message');
    }

    public function destroyAll(Message $message)
    {
        $this->authorize('deleteAll', $message);

        Message::truncate();
        return view('home');
    }
}
