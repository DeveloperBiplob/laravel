@extends('layouts.master')
@section('title', 'Update Category')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Update Category</h3>
            <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $category->name }}">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <img width="100px" src="{{ asset($category->image) }}" alt="">
                    <label for="">Image</label>
                    <input class="form-control" type="file" name="image" id="">
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Update Category">
                </div>
            </form>
        </div>
    </div>
@endsection