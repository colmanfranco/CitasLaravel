@extends('layouts.app')

@section('content')

<form action="/message" method="POST">
    @csrf
    <label for="Name" >
        <input type="text" name="username" id="" placeholder="Name" value="{{$message->name}}">
    </label>
    <label for="Subject">
        <input type="text" name="subject" placeholder="Subject" value="{{$message->subject}}">
    </label>
    <select name="requested_to" id="">
        <option value="Edgar Costilla">Edgar Costilla</option>
        <option value="David Snape">David Snape</option>
    </select>
    <input class="btn btn-success" type="submit" value="Submit">
</form>
@endsection