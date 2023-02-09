<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        @if ($user)
            <h1>{{ $user->name }}</h1>
            <p>I'm <span class="typed" data-typed-items="
                @foreach ($user->jobs as $job)
                    {{ $job->name }},
                @endforeach
            "></span></p>
            <div class="social-links">
                @foreach ($user->sosmeds as $sosmed)
                    <a href="{{ $sosmed->pivot->url }}" target="_blank"><i class="{{ $sosmed->icon }}"></i></a>
                @endforeach
            </div>
        @else
            <h1>Admin</h1>
            <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        @endif
    </div>
</section>
<!-- End Hero -->
