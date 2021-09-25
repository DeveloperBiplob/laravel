@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Has One Through</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Car</th>
                        <th>Owner</th>
                    </tr>
                    @foreach($machanics as $machanic)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $machanic->name }}</td>
                            <td>{{ $machanic->car->name }}</td>
                            <td>{{ $machanic->owner->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection