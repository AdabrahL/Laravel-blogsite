<!-- ================= TOP BAR ================= -->
<div class="top-bar">
    <div class="container d-flex justify-content-center align-items-center flex-wrap gap-4">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-dark mb-0" href="{{ url('/') }}">
            BlogSite
        </a> 

        <!-- Social + Search -->
        <div class="d-flex align-items-center gap-3">
            
            <!-- Social Icons -->
            <div class="socialbtns d-flex align-items-center">
                <a href="https://www.youtube.com/" target="_blank"><img src="https://cdn.ghanaweb.com/design/newtop/yt-icon-Col.png" alt="YouTube"></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="https://cdn.ghanaweb.com/design/newtop/fb-icon-Col.png" alt="Facebook"></a>
                <a href="https://twitter.com/" target="_blank"><img src="https://cdn.ghanaweb.com/design/newtop/X-icon-Col.png" alt="Twitter"></a>
            </div>

            <!-- Search -->
            <div class="search-area-con">
                <form class="flexsearch--form d-flex align-items-center" action="{{ url('/search') }}" method="GET">
                    <input class="search--input" type="search" name="q" placeholder="Search BlogSite">
                    <img class="search-icon" alt="">
                </form>
            </div>
        </div>

        <!-- Links -->
        <div class="Contact-advert-links d-none d-lg-flex align-items-center">
            <a href="#">Self Service Advert</a>
            <a href="#">Sitemap</a>
            <a href="#">Partners</a>
            <a href="#">About Us</a>
        </div>

        <!-- Login/Signup -->
        <div class="login-signup-btns d-flex align-items-center">
            <a href="{{ route('register') }}" class="signUp">Sign up</a>
            <a href="{{ route('login') }}" class="logIn">Login</a>
        </div>
    </div>
</div>




<!-- ================= NAVBAR ================= -->
<nav class="main-navigation-container sticky-top">
    <div class="container d-flex justify-content-center align-items-center flex-wrap gap-4">

        <!-- Categories -->
        <ul class="d-flex mb-0 list-unstyled flex-wrap">
            @foreach($categories as $category)
                <li class="mx-2">
                    <a class="nav-link {{ request()->is('category/'.$category->id) ? 'active' : '' }}" 
                       href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
