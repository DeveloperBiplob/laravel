@extends('layouts.master')
@section('tilte', 'Show Skill')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Skills Details</h3>
            <div class="float-right">
                <a href="{{ route('skill.index') }}" class="btn btn-danger btn-sm">Back Dashboard</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $skill->id }}</td>
                        </tr>
                        <tr>
                            <th>Skill</th>
                            <td>{{ $skill->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img width="150px" src="{{ asset($skill->image) }}" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection