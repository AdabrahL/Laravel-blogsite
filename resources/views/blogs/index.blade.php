@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5 text-center fw-bold">Latest Blog Posts</h1>

    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    
                    {{-- ✅ Blog Image --}}
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             class="card-img-top" 
                             alt="{{ $blog->title }}" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=No+Image" 
                             class="card-img-top" 
                             alt="No image" 
                             style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text text-muted small">
                            {{ $blog->created_at->format('M d, Y') }}
                        </p>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit($blog->content, 120) }}
                        </p>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary mt-auto">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No blog posts available yet.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        @if($blogs instanceof \Illuminate\Contracts\Pagination\Paginator ||
            $blogs instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            {{ $blogs->links('pagination::bootstrap-5') }}
        @endif
    </div>
</div>
@endsection
