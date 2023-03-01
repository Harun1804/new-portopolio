<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Data Education</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="update">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Posisi</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('position') is-invalid @enderror"
                                        placeholder="Nama Posisi" wire:model="position" value="{{ old('position') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('position')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tahun Awal Bekerja</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('year_from') is-invalid @enderror"
                                        placeholder="Tahun Masuk" wire:model="year_from" value="{{ old('year_from') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('year_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tahun Akhir Bekerja (*Jangan di isi jika masih bekerja)</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('year_to') is-invalid @enderror"
                                        placeholder="Tahun Keluar" wire:model="year_to" value="{{ old('year_to') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('year_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Kota Tempat Bekerja</h6>
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
                                <h6>Negara Tempat Bekerja</h6>
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

                            {{-- <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Deskripsi Pekerjaan (*Pisahkan dengan enter)</label>
                                    <textarea class="form-control @error('activity') is-invalid @enderror" id="description" rows="3"
                                        wire:model='activity'></textarea>
                                        @error('activity')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div> --}}

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-primary">Perbaharui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
