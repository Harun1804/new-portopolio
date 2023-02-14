<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah dan Update Data Portopolio</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Kategori</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                        wire:model="category_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <h6>Name</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Portopolio" wire:model="name"
                                        value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tanggal Dimulai Portopolio</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        placeholder="Tanggal Dimulai Portopolio" wire:model="start_date"
                                        value="{{ old('start_date') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Tanggal Selesai Portopolio</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        placeholder="Tanggal Dimulai Portopolio" wire:model="end_date"
                                        value="{{ old('end_date') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>URL</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        placeholder="URL portopolio" wire:model="url" value="{{ old('url') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('url')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Client</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                                        placeholder="Client" wire:model="client"
                                        value="{{ old('client') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('client')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Deskripsi Portopolio</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                        wire:model='description'></textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Thumbnail</h6>
                                <div class="mb-3">
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        placeholder="Portopolio Thumbnail" wire:model="thumbnail" value="{{ old('thumbnail') }}" accept="image/*">
                                    @error('thumbnail')
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
