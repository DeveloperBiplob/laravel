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
                        <th>Country</th>
                        <th>City</th>
                        <th>Shop</th>
                    </tr>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $country->name }}</td>
                            {{-- <td>{{ $country->cities->count() }}</td>
                            <td>{{ $country->shops->count() }}</td> --}}
                            <td>
                                @foreach($country->cities as $city)
                                    <span>{{ $city->name }} ,</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($country->shops as $shop)
                                    <span>{{ $shop->name }} ,</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection