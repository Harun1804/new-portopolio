<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah dan Update Data Tentang Pengguna</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Tanggal Lahir</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        placeholder="Tanggal Lahir" wire:model="date_of_birth"
                                        value="{{ old('date_of_birth') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('date_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Situs</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('site') is-invalid @enderror"
                                        placeholder="Situs" wire:model="site" value="{{ old('site') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('site')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Phone</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Nomor Hape Disertai Kode Negara" wire:model="phone"
                                        value="{{ old('phone') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Kota Tinggal</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        placeholder="Kota Tempat Tinggal Saat Ini" wire:model="city"
                                        value="{{ old('city') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Negara Tinggal</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('nation') is-invalid @enderror"
                                        placeholder="Negara tinggal" wire:model="nation" value="{{ old('nation') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('nation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Freelance Status</h6>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="freelance">Status</label>
                                    <select class="form-select @error('freelance') is-invalid @enderror" id="freelance"
                                        wire:model="freelance">
                                        <option selected>Pilih...</option>
                                        <option value="available">Tersedia</option>
                                        <option value="half available">Tidak Terlalu Sibuk</option>
                                        <option value="not available">Tidak Tersedia</option>
                                    </select>
                                </div>
                                @error('freelance')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Deskripsi Diri</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                        wire:model='description'></textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Profile</h6>
                                <div class="mb-3">
                                    <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                        placeholder="Photo Profile" wire:model="profile" value="{{ old('profile') }}" accept="image/*">
                                    @error('profile')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Header</h6>
                                <div class="mb-3">
                                    <input type="file" class="form-control @error('header') is-invalid @enderror"
                                        placeholder="Header Profile" wire:model="header" value="{{ old('header') }}" accept="image/*">
                                    @error('header')
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
