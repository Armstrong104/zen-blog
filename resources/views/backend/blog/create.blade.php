@extends('backend.master')

@section('title', 'Add Blog')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    @include('notify')
                    <h1 class="mb-4 text-center">Add Blog</h1>
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Blog Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Give a title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Give a slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="description" class="form-control" placeholder="Give a Description" cols="30" rows="3"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image </label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
