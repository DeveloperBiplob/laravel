@extends('layouts.master')
@section('title', 'Category')
@section('master-content')
    <div class="card">
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
                    <td><img src="" alt=""></td>
                    <td>
                        <a href="" class="btn btn-success btn-xs">Edit</a>
                        <a href="" class="btn btn-info btn-xs">Show</a>
                        <a href="" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection