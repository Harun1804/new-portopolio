<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Data Pengguna</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="update">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Nama Pengguna</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Pengguna" wire:model="name" value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Email</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Pengguna" wire:model="email" value="{{ old('email') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    @error('email')
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
