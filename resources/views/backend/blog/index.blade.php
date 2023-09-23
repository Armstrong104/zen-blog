@extends('backend.master')

@section('title','Manage Blog')

@section('content')
    <section class="p-3">
        <div class="container">
            <div class="row">
                @include('notify')
                <div class="col-md-12">
                    <div class="card card-header">
                        <h1 class="text-center">Manage Blog</h1>
                    </div>
                    <div class="card card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->slug }}</td>
                                        <td>{{ $blog->category->name}}</td>
                                        <td>{{ $blog->description }}</td>
                                        <td>
                                            <img src="{{ asset($blog->image) }}" alt="" height="50"
                                                width="50">
                                        </td>
                                        <td>{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                                    class="btn"><i class="fa fa-edit me-2 text-primary"></i></a>
                                                <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
