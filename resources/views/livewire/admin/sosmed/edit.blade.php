<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Data Sosial Media</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="update">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Nama Sosial Media</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Sosial Media" wire:model="name" value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Icon Sosial Media</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        placeholder="Icon SoSial Media" wire:model="icon" value="{{ old('icon') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-github"></i>
                                    </div>
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

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
