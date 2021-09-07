@extends('layouts.master')
@section('title', 'Category')
@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
@section('master-content')
    <div class="card">

        {{-- @if(session()->has('success'))
            {{ session()->get('success') }}
        @endif --}}

        {{-- {{ greetings('biplob') }}  --}}

        <div class="card-header">
            <h3 class="text-info float-left">Manage Categroy</h3>
            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right">Add Category</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img width="150px" src="{{ $category->image }}" alt=""></td>
                    <td>
                        <a href="" class="btn btn-success btn-xs">Edit</a>
                        <a href="" class="btn btn-info btn-xs">Show</a>
                        <a href="" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection