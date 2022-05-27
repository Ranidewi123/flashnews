@extends('layouts.app')

@section('menu-home')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Welcome {{ Auth::user()->name }}!</h3>
                            @if(Auth::user()->isAdmin())
                                You are an Admin
                            @endif

                            @if(Auth::user()->isUser())
                                You are an User
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
