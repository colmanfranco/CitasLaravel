@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Welcome {{ Auth::user()->name }}!</h2></div>

                <div class="card-body" style="display: flex;flex-direction: row;justify-content: center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a class="btn btn-warning" href="/message">Appointment List</a>
                        <a class="btn btn-primary"  href="/message/create">Request Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
