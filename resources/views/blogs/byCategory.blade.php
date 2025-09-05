@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $category->name }} Blogs</h2>

    @foreach($blogs as $blog)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $blog->title }}</h4>
                <p>{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">Read More</a>
            </div>
        </div>
    @endforeach

    {{ $blogs->links() }}
</div>
@endsection
