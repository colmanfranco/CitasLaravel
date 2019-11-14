@extends('layouts.app')

@section('content')

<div style="display: flex;justify-content: center; padding: 10px;">
    <h1>New Appointment</h1>
</div>
<div style="display: flex;justify-content: center;">
    <form action="/message" method="POST">
        @csrf
        <div style="padding: 10px;">
            <label for="Name" >Name</label>
            <input type="text" name="username" id="" placeholder="Name" value="{{$message->name}}" required>
        </div>
        <div style="padding: 10px;">
            <label for="Subject">Subject</label>
            <input type="text" name="subject" placeholder="Subject" value="{{$message->subject}}" required>
        </div>
        <div style="padding: 10px;">
            <label for="Trainer">Trainer</label>
            <select name="requested_to" id="" required>
                <option value="Edgar Costilla">Edgar Costilla</option>
                <option value="David Snape">David Snape</option>
            </select>
        </div>
        <div style="padding: 10px;">
            <input class="btn btn-success" type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection

