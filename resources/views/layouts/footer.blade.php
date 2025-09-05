<footer class="text-white mt-5 pt-4 pb-3" style="background-color: #2e5d71;">
    <div class="container">
        <div class="row">

            <!-- About Section -->
            <div class="col-md-4 mb-3">
                <h5>About Us</h5>
                <p>
                    Welcome to our blog! Here we share articles on real estate, land buying tips, and more.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('blogs.index') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="text-white text-decoration-none">Blog</a></li>
                    <li><a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">Dashboard</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4 mb-3">
                <h5>Contact</h5>
                <p>Email: lincolnadabrah@gmail.com</p>
                <p>Phone: +233 557 440 609</p>
                <div>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>

        <hr class="bg-secondary">

        <div class="text-center">
            &copy; {{ date('Y') }} BlogSite. All rights reserved.
        </div>
    </div>
</footer>
