@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-row">
        <div class="col-xs-1-12">

            @if (isset($success))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <strong>$success</strong>
                    </div>
                </div>
        </div>
        @endif
            <h1 class="title">Appointment List</h1>
@if ($messages->all() == null)
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h1><strong> No Appointments in queue</strong></h1>
            </div>
@endif
@cannot('view', Message::class)
    <div class="card-columns">

        @foreach ($messages as $message)
        <div class="card">
             {{ csrf_field() }}
            <div class="card-body">
                <h5 class="card-title">{{$message->subject}}</h5>
                <h6 class="card-subtitle mb-2 text-muted"><strong>Requested By:</strong>{{$message->username}}</h6>
                <h6><strong>Trainer:</strong> {{$message->requested_to}}</h6>
                <h6 class="card-subtitle mb-2 text-muted"><strong>Requested at:</strong>{{$message->created_at}}</h6>
                <div class="btn-group a" role="group">
                    @can('update', $message)
                        <form method="get" action="/message/{{$message->id}}/edit">
                            <button class="btn btn-secondary" type="submit">Edit</button>
                        </form>
                    @endcan
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

        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="/message/create">
                <button class="btn btn-primary">
                    Request Appointment
                </button>
            </a>
            @can('deleteAll', $message)
                <form action="/all-messages" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        <a class="btn btn-danger" type="submit">Delete All</a>
                    </button>
                </form>
        </div>
            @endcan
    </div>
    </div>

</div>
@endcannot
@endsection

