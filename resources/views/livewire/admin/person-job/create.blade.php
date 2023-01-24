<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Assign Pekerjaan Ke Peserta</h4>
                </div>

                <div class="card-body">
                    <form method="post" wire:submit.prevent="store">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h6>Pekerjaan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select @error('job_id') is-invalid @enderror" id="basicSelect" wire:model="job_id">
                                        <option selected>Pilih Pekerjaan</option>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('job_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
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
