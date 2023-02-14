<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" wire:submit.prevent="addSlideshow" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <h6>Slider</h6>
                            <div class="mb-3">
                                <input type="file" class="form-control @error('imageShow') is-invalid @enderror"
                                    placeholder="Portopolio imageShow" wire:model="imageShow"
                                    value="{{ old('imageShow') }}" accept="image/*">
                                @error('imageShow')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-danger btn-sm text-white" wire:click="closeShow">Back</button>
        </div>
        <div class="card-body">
            <div id="carouselPortopolio" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    @forelse ($sliders as $key => $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <a wire:click="confirmSlideshow({{ $slider->id }})">
                                <img src="{{ $slider->image }}" alt="{{ $key }}" class="w-100">
                            </a>
                        </div>
                    @empty
                        <div class="alert alert-info" style="text-align: center;">Belum Ada Slider</div>
                    @endforelse
                </div>
                @if (count($sliders) > 0)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPortopolio"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPortopolio"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>
