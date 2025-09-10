@extends('layouts.app')
@include('layouts.navbar')
@include('layouts.carousel')

@section('content')
<div class="container my-5">

    {{-- 🔹 Featured Post --}}
    @if($blogs->count())
        <div class="row mb-5">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <img src="{{ asset('storage/' . $blogs[0]->image) }}" 
                         alt="{{ $blogs[0]->title }}" 
                         class="w-100" style="height:400px; object-fit:cover;">
                    <div class="card-body p-4">
                        <span class="badge bg-primary small mb-2">
                            {{ $blogs[0]->category->name ?? 'General' }}
                        </span>
                        <h2 class="fw-bold mb-3" style="color:#0b3d91;">
                            {{ $blogs[0]->title }}
                        </h2>
                        <p class="text-muted small mb-3">
                            {{ $blogs[0]->created_at->format('F d, Y') }}
                        </p>
                        <p class="text-dark" style="line-height:1.6;">
                            {!! Str::limit(strip_tags($blogs[0]->content), 200) !!}
                        </p>
                        <a href="{{ route('blogs.show', $blogs[0]->id) }}" 
                           class="btn btn-primary rounded-pill px-4">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>

            {{-- 🔹 Sidebar Latest --}}
            <div class="col-md-4">
                <h4 class="fw-bold mb-3">Latest Updates</h4>
                @foreach($blogs->skip(1)->take(4) as $blog)
                    <div class="d-flex mb-3 border-bottom pb-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             style="width:100px; height:70px; object-fit:cover; border-radius:8px;">
                        <div class="ms-3">
                            <a href="{{ route('blogs.show', $blog->id) }}" 
                               class="fw-semibold text-dark text-decoration-none">
                                {{ Str::limit($blog->title, 50) }}
                            </a>
                            <p class="text-muted small mb-0">
                                {{ $blog->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

{{-- ✅ Trending Section --}}
@if($blogs->count() > 5)
    <h3 class="fw-bold mb-4">🔥 Trending Now</h3>
    <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
        @foreach($blogs->take(5) as $trend)
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                    <a href="{{ route('blogs.show', $trend->id) }}">
                        <img src="{{ $trend->image ? asset('storage/' . $trend->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                             class="card-img-top" 
                             style="height: 120px; object-fit: cover; filter: brightness(85%);">
                    </a>
                    <div class="card-body p-2">
                        <h6 class="fw-semibold text-truncate" style="font-size: 14px;">
                            <a href="{{ route('blogs.show', $trend->id) }}" class="text-decoration-none text-dark">
                                {{ $trend->title }}
                            </a>
                        </h6>
                        <small class="text-muted">
                            {{ $trend->created_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif


    {{-- 🔹 Blog Grid --}}
    <h3 class="fw-bold mb-4">More Stories</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($blogs->skip(5) as $blog)
            <div class="col">
                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->image) }}" 
                         class="card-img-top" alt="{{ $blog->title }}"
                         style="height:180px; object-fit:cover;">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-secondary small">
                                {{ $blog->category->name ?? 'General' }}
                            </span>
                            <small class="text-muted">
                                {{ $blog->created_at->format('M d, Y') }}
                            </small>
                        </div>
                        <h6 class="fw-bold text-truncate" style="color:#0b3d91;">
                            {{ $blog->title }}
                        </h6>
                        <p class="small text-muted flex-grow-1" 
                           style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                            {!! Str::limit(strip_tags($blog->content), 100) !!}
                        </p>
                        <a href="{{ route('blogs.show', $blog->id) }}" 
                           class="btn btn-outline-primary btn-sm rounded-pill mt-auto">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>
@include('layouts.footer')
@endsection
