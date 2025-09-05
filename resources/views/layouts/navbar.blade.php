<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0E2004;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">BlogSite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.show', $category->id) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>

        </div>
    </div>
</nav>
