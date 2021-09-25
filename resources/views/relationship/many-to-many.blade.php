@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Many To Many</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    {{-- <tr>
                        <th>Sl</th>
                        <th>User Name</th>
                        <th>User Skills</th>
                        <th>View (Pivot Table )</th>
                    </tr>

                    <!--Uses Theke Skills Data Fatch-->
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach($user->skills as $skill)
                                    <span class="badge badge-info">{{ $skill->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->skills as $skill)
                                    {{-- <span class="badge badge-info">{{ $skill->pivot->view }}</span>
                                    <span class="badge badge-info">{{ $skill->my_pivot->view }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach --}}


                    <!--Skills Theke Users Data Fatch-->
                    <tr>
                        <th>Sl</th>
                        <th>Skills Name</th>
                        <th>Skills in User</th>
                        <th>View (Pivot Table )</th>
                    </tr>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>
                                @foreach($skill->users as $user)
                                    <span class="badge badge-info">{{ $user->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->skills as $skill)
                                    <span class="badge badge-info">{{ $user->my_pivot->view }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection