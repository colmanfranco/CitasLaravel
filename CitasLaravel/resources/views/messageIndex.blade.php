@extends('layouts.app')

@section('content')
<div style="display: flex;justify-content: center; padding: 10px;">
    <h1>Appointment List</h1>
</div>
@if ($messages->all() == null)
    <h1>No Appointments in queue</h1>
@endif
@cannot('view', Message::class)
<div style="display: flex;flex-direction: column;justify-content: space-evenly;">
    @foreach ($messages as $message)
        <div style="display: flex; flex-direction: row;justify-content: space-evenly;">
            {{ csrf_field() }}
            <div>
                <p><strong>Name:</strong> {{$message->username}}</p>
                <p><strong>Subject:</strong> {{$message->subject}}</p>
                <p><strong>Trainer:</strong> {{$message->requested_to}}</p>
                <p><strong>Time:</strong> {{$message->created_at}}</p>
                <p>--------------------------</p>
            </div>
            <div style="display: flex;flex-direction: column;justify-content: space-around;height: 130px;">
                <div>
                    @can('update', $message)
                        <form method="get" action="/message/{{$message->id}}/edit">
                            <button class="btn btn-secondary" type="submit">Edit</button>
                        </form> 
                    @endcan
                </div>
                <div>
                    @can('delete', $message)
                        <form action="/message/{{$message->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    @endforeach
</div>
<div style="display: flex;flex-direction: row;justify-content: center;">
    <div>
        <a class="btn btn-primary" href="/message/create">Request Appointment</a>
    </div>
    @can('deleteAll', $message)
    <div>
        <form action="/all-messages" method="POST">
            @csrf
            @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete All Appointments</button>
        </form>
    </div>
    @endcan
</div>
@endcannot
@endsection

