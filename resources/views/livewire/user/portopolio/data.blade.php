<section class="section">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary btn-sm mb-2 float-end" type="button" wire:click="create">Tambah</button>
        </div>
    </div>
    <div class="row">
        @forelse ($portopolios as $portopolio)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $portopolio->thumbnail }}" class="card-img-top" alt="{{ $portopolio->name }}" height="250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $portopolio->name }}</h5>
                    <p class="card-text">{{ $portopolio->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-start">Start Date <span class="badge bg-primary rounded-pill">{{ $portopolio->start_date }}</span></li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">End Date <span class="badge bg-primary rounded-pill">{{ $portopolio->end_date }}</span></li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">Client <span class="badge bg-primary rounded-pill">{{ $portopolio->client }}</span></li>
                </ul>
                <div class="card-footer">
                    <a href="#" class="card-link btn btn-sm btn-info text-white">Detail</a>
                    <button type="button" class="card-link btn btn-sm btn-warning text-white" wire:click="edit({{ $portopolio->id }})">Edit</button>
                    <button type="button" class="card-link btn btn-sm btn-danger text-white" wire:click="confirm({{ $portopolio->id }})">Delete</button>
                    {{-- <form method="post" wire:submit.prevent="confirm({{ $portopolio->id }})" class="d-inline">
                        @csrf
                        <button type="submit" class="card-link btn btn-sm btn-danger text-white">Delete</button>
                    </form> --}}
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-info">Belum Ada Portopolio</div>
        </div>
        @endforelse
    </div>
</section>
