@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Admin Dashboard</h1>

<!-- Stats Cards -->
<div class="row mb-4">
    <!-- Total Blogs -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <i class="fas fa-blog"></i> Total Blogs: {{ $blogsCount }}
            </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <i class="fas fa-users"></i> Total Users: {{ $usersCount ?? 0 }}
            </div>
        </div>
    </div>

    <!-- Published Blogs -->
    
    <!-- <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">
                <i class="fas fa-check-circle"></i> Published: {{ $publishedCount ?? 0 }}
            </div>
        </div>
    </div>
-->

    <!-- Create Blog -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <i class="fas fa-plus-circle"></i>
                <a href="{{ route('admin.create') }}" class="text-white text-decoration-none">Create Blog</a>
            </div>
        </div>
    </div>
</div>

<!-- Blogs Table -->
<div class="card shadow">
    <div class="card-body">
        @if($blogs->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/'.$blog->image) }}" width="80" class="rounded">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $blog->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.destroy', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $blogs->links('pagination::bootstrap-5') }}
        @else
            <p>No blogs available. Start by creating one!</p>
        @endif
    </div>
    
</div>
@include('layouts.footer')

@endsection
