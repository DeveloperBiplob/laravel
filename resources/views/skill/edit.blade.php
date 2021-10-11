@extends('layouts.master')
@section('title', 'Update Skill')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Update Skill</h3>
            <a href="{{ route('skill.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('skill.update', $skill->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Skills</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $skill->name }}">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <img width="100px" src="{{ asset($skill->image) }}" alt="">
                    <label for="">Image</label>
                    <input class="form-control" type="file" name="image" id="">
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Update Skill">
                </div>
            </form>
        </div>
    </div>
@endsection