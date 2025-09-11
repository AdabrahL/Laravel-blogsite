@extends('layouts.app')
@include('layouts.navbar')
@section('title', $category->name)

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fade-in-up">{{ $category->name }}</h1>

    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4 fade-in-up delay-{{ $loop->index }}">
                <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark h-100 d-block">
                    <div class="card h-100 shadow-sm blog-fade">
                        {{-- ✅ Blog Image --}}
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 class="card-img-top blog-image" 
                                 alt="{{ $blog->title }}" 
                                 style="height:200px; object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/400x200" 
                                 class="card-img-top blog-image" 
                                 alt="No Image" 
                                 style="height:200px; object-fit:cover;">
                        @endif

                        <div class="card-body d-flex flex-column p-4">

                            {{-- ✅ Category + Date + Views Row --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                @if($blog->category)
                                    <span class="badge rounded-pill px-2 py-1" 
                                          style="background:#0b3d91; color:#fff; font-size:0.7rem;">
                                        {{ $blog->category->name }}
                                    </span>
                                @endif
                                <div class="text-muted small">
                                    {{ $blog->created_at->format('M d, Y') }} · 👁 {{ $blog->views ?? 0 }}
                                </div>
                            </div>

                            {{-- ✅ Blog Title --}}
                            <h5 class="card-title fw-bold text-truncate" style="color:#0b3d91;">
                                {{ $blog->title }}
                            </h5>

                            {{-- ✅ Blog Preview --}}
                            <p class="card-text flex-grow-1"
                               style="font-size:14px; line-height:1.6; text-align:justify;
                                      display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;
                                      overflow:hidden; text-overflow:ellipsis;">
                                {!! Str::limit(strip_tags($blog->content), 150) !!}
                            </p>

                            {{-- ✅ Read More (kept for UX, but whole card is clickable) --}}
                            <div class="mt-auto">
                                <span class="btn btn-outline-primary w-100 rounded-pill shadow-sm fw-semibold">
                                    Read More →
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center fade-in-up">No blogs available in this category yet.</p>
        @endforelse
    </div>
</div>

{{-- Animation JS --}}

@endsection
