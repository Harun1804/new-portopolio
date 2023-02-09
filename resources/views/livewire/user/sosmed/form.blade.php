<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Perbaharui Sosial Media User</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Sosial Media</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select @error('sosmed_id') is-invalid @enderror" id="sosmed_id"
                                        wire:model="sosmed_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($sosmeds as $sosmed)
                                            <option value="{{ $sosmed->id }}">{{ ucfirst($sosmed->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sosmed_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <h6>Url</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        placeholder="Situs" wire:model="url" value="{{ old('url') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('url')
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
