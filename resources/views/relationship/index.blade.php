@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Relationship</h1>
                <hr>
            </div>
            <div class="card-body">
                @foreach($users as $user)
                <h6>ID : {{ $user->id }}</h6>
                <h6>Name : {{ $user->name }}</h6>
                <p>Phone : {{ $user->profile->phone ?? ''}}</p>
                <p>View : {{ optional($user->profile)->view }}</p> <!-- optional() jodi data thake tile asbe, na thakle error show korbe na. -->
                <p>Address : {{ $user->profile->address }}</p> <!--Model e define kore - return $this->hasOne(profile::class, 'user_id', 'id')->withDefault();  -->
                <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection