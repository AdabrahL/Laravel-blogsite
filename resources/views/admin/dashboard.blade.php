@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Create Blog Button -->
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">
        + Create New Blog
    </a>

    <!-- Blogs Table -->
    <div class="card shadow">
        <div class="card-body">
            @if($blogs->count() > 0)
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" 
                                         alt="Blog Image" 
                                         class="img-thumbnail" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('admin.destroy', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ✅ Pagination -->
                <div class="mt-3">
                    @if($blogs instanceof \Illuminate\Contracts\Pagination\Paginator ||
                        $blogs instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    @endif
                </div>

            @else
                <p>No blogs available. Start by creating one!</p>
            @endif
        </div>
    </div>
</div>
@endsection
