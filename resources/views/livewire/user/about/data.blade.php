<section class="section">
    <button class="btn btn-primary btn-sm mb-2" type="button" wire:click='create'>Tambah atau Perbaharui Data</button>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $about->profile }}" class="img-fluid rounded-start" alt="{{ $about->user->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $about->user->name }}</h5>
                            <hr>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        href="#home" role="tab" aria-controls="home"
                                        aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        href="#contact" role="tab" aria-controls="contact"
                                        aria-selected="false">Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <p class="my-2">
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    Integer interdum diam eleifend metus lacinia, quis
                                    gravida eros mollis. Fusce non sapien sit amet magna
                                    dapibus ultrices. Morbi tincidunt magna ex, eget
                                    faucibus sapien bibendum non. Duis a mauris ex. Ut
                                    finibus risus sed massa mattis porta. Aliquam sagittis
                                    massa et purus efficitur ultricies. Integer pretium
                                    dolor at sapien laoreet ultricies. Fusce congue et lorem
                                    id convallis. Nulla volutpat tellus nec molestie
                                    finibus. In nec odio tincidunt eros finibus ullamcorper.
                                    Ut sodales, dui nec posuere finibus, nisl sem aliquam
                                    metus, eu accumsan lacus felis at odio. Sed lacus quam,
                                    convallis quis condimentum ut, accumsan congue massa.
                                    Pellentesque et quam vel massa pretium ullamcorper vitae
                                    eu tortor.
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <p class="mt-2">
                                        Duis ultrices purus non eros fermentum hendrerit.
                                        Aenean ornare interdum viverra. Sed ut odio velit.
                                        Aenean eu diam dictum nibh rhoncus mattis quis ac
                                        risus. Vivamus eu congue ipsum. Maecenas id
                                        sollicitudin ex. Cras in ex vestibulum, posuere orci
                                        at, sollicitudin purus. Morbi mollis elementum enim,
                                        in cursus sem placerat ut.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</section>
