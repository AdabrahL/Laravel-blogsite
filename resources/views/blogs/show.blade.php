@extends('layouts.app')
@include('layouts.navbar')
@include('layouts.carousel')

@section('content')


<div class="container my-5">

    <div class="card shadow-lg border-0 rounded-3 overflow-hidden">

        {{-- ✅ Blog Image --}}
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" 
                 alt="{{ $blog->title }}" 
                 class="w-100" 
                 style="max-height: 450px; object-fit: cover;">
        @else
            <img src="https://via.placeholder.com/1200x450?text=No+Image" 
                 alt="No image" 
                 class="w-100" 
                 style="max-height: 450px; object-fit: cover;">
        @endif

        <div class="card-body p-5">

            {{-- ✅ Blog Title --}}
            <h1 class="fw-bold mb-3 text-center">{{ $blog->title }}</h1>

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
                <a href="{{ route('blogs.index') }}" class="btn btn-lg btn-outline-secondary px-4">
                    ← Back to Blogs
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
