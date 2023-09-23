@extends('backend.master')

@section('title','Manage Category')

@section('content')
    <section class="p-3">
        <div class="container">
            <div class="row">
                @include('notify')
                <div class="col-md-12">
                    <div class="card card-header">
                        <h1 class="text-center">All Category (Total {{ $categories->count() }})</h1>
                    </div>
                    <div class="card card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->desc }}</td>
                                        <td>
                                            <img src="{{ asset($category->icon) }}" alt="" height="50"
                                                width="50">
                                        </td>
                                        <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-outline-success">Edit</a>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}"
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
