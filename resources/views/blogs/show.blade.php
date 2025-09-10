@extends('layouts.app')
@include('layouts.navbar')


@section('content')
<div class="container my-5">

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        {{-- ✅ Blog Image --}}
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" 
                 alt="{{ $blog->title }}" 
                 class="w-100"
                 style="max-height: 450px; object-fit: cover; border-bottom: 4px solid #0b3d91;">
        @else
            <img src="https://via.placeholder.com/1200x450?text=No+Image" 
                 alt="No image" 
                 class="w-100"
                 style="max-height: 450px; object-fit: cover; border-bottom: 4px solid #0b3d91;">
        @endif

        <div class="card-body p-5">

            {{-- ✅ Blog Category Badge --}}
            @if($blog->category)
                <div class="text-center mb-3">
                    <span class="badge rounded-pill px-4 py-2" 
                          style="background: #0b3d91; color: #fff; font-size: 0.9rem;">
                        {{ $blog->category->name }}
                    </span>
                </div>
            @endif

            {{-- ✅ Blog Title --}}
            <h1 class="fw-bold mb-3 text-center" style="color: #0b3d91;">
                {{ $blog->title }}
            </h1>

            {{-- ✅ Blog Meta Info --}}
            <p class="text-muted text-center mb-4">
                Published on {{ $blog->created_at->format('F d, Y') }}
            </p> 

            {{-- ✅ Blog Content --}}
            <div class="fs-5 lh-lg text-dark" style="text-align: justify;">
                {!! $blog->content !!}
            </div>

            {{-- ✅ Back Button --}}
            <div class="text-center mt-5">
                <a href="{{ route('blogs.index') }}" 
                   class="btn btn-lg btn-outline-primary px-4 rounded-pill shadow-sm">
                    ← Back to Blogs
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
