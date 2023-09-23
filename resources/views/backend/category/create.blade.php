@extends('backend.master')

@section('title','Add Category')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                    @include('notify')
                    <h1 class="mb-4 text-center">Add Category</h1>
                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Give a Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="desc" class="form-control" placeholder="Give a Description" cols="30" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon </label>
                            <input type="file" name="icon" accept="image/*" class="form-control">
                            @error('icon')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
