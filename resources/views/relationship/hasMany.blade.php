@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Has Many Relationship</h1>
            </div>
            <div class="card-body">
                {{-- @foreach($users->load('posts') as $user) // lazy load blade e use kora jay. but ata controller e use korbo. --}}
                @foreach($users as $user)
                    <h4>User Id : {{ $user->id }}</h4>
                    <h6>Name : {{ $user->name }}</h6>
                    <hr>                   
                    @foreach($user->posts as $post)
                        <p>Post Title : {{ $post->title }}</p>
                        <p>Post View : {{ $post->view }}</p>
                        <hr>
                    @endforeach

                @endforeach
            </div>
        </div>
    </div>
@endsection