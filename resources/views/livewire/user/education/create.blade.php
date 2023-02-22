<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Pendidikan</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Jenjang</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select @error('level') is-invalid @enderror" id="level"
                                        wire:model="level">
                                        <option selected>Pilih...</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                @error('level')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <h6>Jurusan</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('major') is-invalid @enderror"
                                        placeholder="Nama Jurusan" wire:model="major" value="{{ old('major') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('major')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tahun Masuk</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('year_in') is-invalid @enderror"
                                        placeholder="Tahun Masuk" wire:model="year_in" value="{{ old('year_in') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('year_in')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tahun Keluar</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('year_out') is-invalid @enderror"
                                        placeholder="Tahun Keluar" wire:model="year_out" value="{{ old('year_out') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('year_out')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>University</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('university') is-invalid @enderror"
                                        placeholder="University" wire:model="university" value="{{ old('university') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('university')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Kota Tempat Pendidikan</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        placeholder="City" wire:model="city" value="{{ old('city') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('city')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Negara Tempat Pendidikan</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('nation') is-invalid @enderror"
                                        placeholder="Nation" wire:model="nation" value="{{ old('nation') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('nation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
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
