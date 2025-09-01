@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5 text-center fw-bold">Latest Blog Posts</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($blogs as $blog)
            <div class="col">
                <div class="card shadow-sm border-0 d-flex flex-column h-100" style="height: 480px;"> {{-- ✅ Fixed uniform height --}}

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

                    {{-- ✅ Card Body --}}
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">{{ $blog->title }}</h5>
                        <p class="card-text text-muted small mb-2">
                            {{ $blog->created_at->format('M d, Y') }}
                        </p>

                        {{-- ✅ Blog Preview (clamped to avoid stretching) --}}
                        <p class="card-text flex-grow-1"
                           style="font-size:14px; line-height:1.6; text-align:justify;
                                  display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical;
                                  overflow:hidden; text-overflow:ellipsis;">
                            {!! Str::limit(strip_tags($blog->content), 150) !!}
                        </p>

                        {{-- ✅ Button (always aligned at bottom, same style) --}}
                        <div class="mt-auto">
                            <a href="{{ route('blogs.show', $blog->id) }}" 
                               class="btn btn-primary w-100">
                                Read More →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No blog posts available yet.</p>
        @endforelse
    </div>

    {{-- ✅ Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        @if($blogs instanceof \Illuminate\Contracts\Pagination\Paginator ||
            $blogs instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            {{ $blogs->links('pagination::bootstrap-5') }}
        @endif
    </div>
</div>
@endsection
