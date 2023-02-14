<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Service</h4>
                </div>
                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Nama Service</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Service" wire:model="name" value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Icon Service</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        placeholder="Icon Service" wire:model="icon" value="{{ old('icon') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-github"></i>
                                    </div>
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Deskripsi Service</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                        wire:model='description'></textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
