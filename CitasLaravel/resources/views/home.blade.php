@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-3-8">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Welcome {{ Auth::user()->name }}!</h2></div>
                @if (session('status'))
                    <div class="alert alert-info" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
            </div>
            @endif
            @isset($messages)
                <button type="button" class="btn btn-success"><a class="btn btn-success" href="/message">Appointment
                        List</a></button>
            @endisset
            <div class="btn-group a" role="group">
                @empty($messages)
                    <button type="button" class="btn btn-dark"><a class="btn btn-dark disabled"
                                                                  href="/message">No Appointments</a></button>
                @endempty
                <button type="button" class="btn btn-primary"><a class="btn btn-primary" href="/message/create">Request
                        Appointment</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
