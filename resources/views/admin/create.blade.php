@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Blog</h1>

   <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Title -->
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- Content -->
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" rows="5" class="form-control" required></textarea>
    </div>

    <!-- Image Upload -->
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Save Blog</button>
</form>

</div>
@endsection
