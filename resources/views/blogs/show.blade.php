@extends('layouts.app')

@include('layouts.navbar')

@section('title', $blog->title)

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- ✅ Blog Card --}}
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden blog-fade">
                {{-- Blog Image --}}
                @if($blog->image)
                    <div class="blog-image-wrapper">
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="blog-image w-100">
                    </div>
                @else
                    <div class="blog-image-wrapper">
                        <img src="https://via.placeholder.com/800x450" 
                             alt="No Image" 
                             class="blog-image w-100">
                    </div>
                @endif

                <div class="card-body p-5">
                    {{-- ✅ Category + Date + Views --}}
                    <div class="d-flex justify-content-between align-items-center mb-3 fade-in-up">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background:#0b3d91; color:#fff;">
                            {{ $blog->category->name ?? 'General' }}
                        </span>
                        <div class="text-muted small">
                            {{ $blog->created_at->format('F d, Y') }} · 👁 {{ $blog->views ?? 0 }}
                        </div>
                    </div>

                    {{-- ✅ Blog Title --}}
                    <h1 class="fw-bold mb-4 fade-in-up delay-1" style="color:#0b3d91;">
                        {{ $blog->title }}
                    </h1>

                    {{-- ✅ Blog Content --}}
                    <div class="blog-content fade-in-up delay-2">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>

            {{-- ✅ Back Button --}}
            <div class="mt-4 text-center fade-in-up delay-3">
                <a href="{{ url()->previous() }}" 
                   class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                    ← Back
                </a>
            </div>

        </div>
    </div>
</div>


@endsection
