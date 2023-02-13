<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-primary" wire:click='create'>Tambah</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Nama" wire:model='name'></th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>JUMLAH PORTOPOLIO BERKATEGORI INI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                        <td class="text-bold-500">{{ ucfirst($category->name ) }}</td>
                                        <td class="text-bold-500">0</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning d-inline text-white" wire:click="edit({{ $category->id }})">Edit</button>
                                            <form method="post" wire:submit.prevent="confirm({{ $category->id }})" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center">No Data Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
