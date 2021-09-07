@extends('layouts.master')
@section('tilte', 'Show Category')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Category Details</h3>
            <div class="float-right">
                <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm">Back Dashboard</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img width="150px" src="{{ asset($category->image) }}" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection