@extends('layouts.master')
@section('title', 'Skills')
@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Manage Skills</h3>
            <a href="{{ route('skill.create') }}" class="btn btn-primary btn-sm float-right">Add Skill</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>User Role</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->user->name }}</td>
                    <td><img width="150px" src="{{ $skill->image }}" alt=""></td>
                    <td>
                        <a href="{{ route('skill.edit', $skill->slug) }}" class="btn btn-success btn-xs">Edit</a>
                        <a href="{{ route('skill.show', $skill->slug) }}" class="btn btn-info btn-xs">Show</a>
                        <form class="d-inline-block" action="{{ route('skill.destroy', $skill->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $skills->links() }}
        </div>
    </div>
@endsection