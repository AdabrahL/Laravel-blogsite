@extends('layouts.app')
@include('layouts.navbar')
@include('layouts.carousel')

@section('content')
<div class="container my-5">

    {{-- 🔹 Featured Post --}}
    @if($blogs->count())
        <div class="row mb-5 fade-in-up">
            <div class="col-md-8">
                <a href="{{ route('blogs.show', $blogs[0]->id) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden blog-fade">
                        <img src="{{ asset('storage/' . $blogs[0]->image) }}" 
                             alt="{{ $blogs[0]->title }}" 
                             class="w-100 blog-image" style="height:400px; object-fit:cover;">
                        <div class="card-body p-4">
                            <span class="badge bg-primary small mb-2">
                                {{ $blogs[0]->category->name ?? 'General' }}
                            </span>
                            <h2 class="fw-bold mb-3" style="color:#0b3d91;">
                                {{ $blogs[0]->title }}
                            </h2>
                            <p class="text-muted small mb-3">
                                {{ $blogs[0]->created_at->format('F d, Y') }} · 👁 {{ $blogs[0]->views ?? 0 }}
                            </p>
                            <p class="text-dark" style="line-height:1.6;">
                                {!! Str::limit(strip_tags($blogs[0]->content), 200) !!}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            
            {{-- Sidebar Latest --}}
            <div class="col-md-4 fade-in-up delay-2">
                <h4 class="fw-bold mb-3">Latest Updates</h4>
                @foreach($blogs->skip(1)->take(4) as $blog)
                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark">
                        <div class="d-flex mb-3 border-bottom pb-2 fade-in-up blog-fade">
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}" 
                                 style="width:100px; height:70px; object-fit:cover; border-radius:8px;">
                            <div class="ms-3">
                                <span class="fw-semibold">{{ Str::limit($blog->title, 50) }}</span>
                                <p class="text-muted small mb-0">
                                    {{ $blog->created_at->format('M d, Y') }} · 👁 {{ $blog->views ?? 0 }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- 🔥 Trending --}}
    @if($blogs->count() > 5)
        <h3 class="fw-bold mb-4 fade-in-up">🔥 Trending Now</h3>
        <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
            @foreach($blogs->take(5) as $trend)
                <div class="col fade-in-up delay-{{ $loop->index }}">
                    <a href="{{ route('blogs.show', $trend->id) }}" class="text-decoration-none text-dark">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 blog-fade">
                            <img src="{{ $trend->image ? asset('storage/' . $trend->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                                 class="card-img-top blog-image" style="height:120px; object-fit:cover;">
                            <div class="card-body p-2">
                                <h6 class="fw-semibold text-truncate" style="font-size:14px;">
                                    {{ $trend->title }}
                                </h6>
                                <small class="text-muted">
                                    {{ $trend->created_at->format('M d, Y') }} · 👁 {{ $trend->views ?? 0 }}
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    {{-- More Stories --}}
    <h3 class="fw-bold mb-4">More Stories</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($blogs->skip(5) as $blog)
            <div class="col fade-in-up delay-{{ $loop->index }}">
                <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden blog-fade">
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             class="card-img-top blog-image" style="height:180px; object-fit:cover;">
                        <div class="card-body d-flex flex-column p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary small">
                                    {{ $blog->category->name ?? 'General' }}
                                </span>
                                <small class="text-muted">
                                    {{ $blog->created_at->format('M d, Y') }} · 👁 {{ $blog->views ?? 0 }}
                                </small>
                            </div>
                            <h6 class="fw-bold text-truncate" style="color:#0b3d91;">
                                {{ $blog->title }}
                            </h6>
                            <p class="small text-muted flex-grow-1">
                                {!! Str::limit(strip_tags($blog->content), 100) !!}
                            </p>
                        </div>
                    </div>
                </a>
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
