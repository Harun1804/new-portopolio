<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Perbaharui Kemampuan User</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Kemampuan</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select @error('skill_id') is-invalid @enderror" id="skill_id"
                                        wire:model="skill_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ ucfirst($skill->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('skill_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <h6>Value / Nilai (1 - 100)</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="number" class="form-control @error('skill_value') is-invalid @enderror"
                                        placeholder="Value" wire:model="skill_value" value="{{ old('skill_value') }}" max="100" min="0">
                                    <div class="form-control-icon">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    @error('skill_value')
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
