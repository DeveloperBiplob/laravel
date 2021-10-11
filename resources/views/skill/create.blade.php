@extends('layouts.master')
@section('title', 'Add Skill')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Add Skill</h3>
            <a href="{{ route('skill.index') }}" class="btn btn-success btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter a Category Name">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="form-control" >
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                <div class="form-group">
                    <button class="btn btn-success btn-block">Add Skill</button>
                </div>
            </form>
        </div>
    </div>
@endsection