@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>View Component</h1>
            </div>
            <div class="card-body">
                <p>{{ $test }}</p>
                @foreach($users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection