@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Blog Post</h2>

    <form action="{{ route('admin.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" 
                   value="{{ old('title', $blog->title) }}" 
                   class="form-control" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Content</label>
            <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <!-- Current Image Preview -->
        @if($blog->image)
            <div class="mb-3">
                <label class="form-label fw-bold">Current Image</label><br>
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" 
                     class="img-fluid rounded mb-2" style="max-height: 200px;">
            </div>
        @endif

        <!-- Upload New Image -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Change Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
