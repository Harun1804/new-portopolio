<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Perbaharui Pelayanan User</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Jenis Pelayanan</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select @error('service_id') is-invalid @enderror" id="service_id"
                                        wire:model="service_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ ucfirst($service->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('service_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
