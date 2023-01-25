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
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Email" wire:model='email'></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td class="text-bold-500">{{ ucfirst($user->name ) }}</td>
                                        <td class="text-bold-500">{{ $user->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning d-inline text-white" wire:click="edit({{ $user->id }})">Edit</button>
                                            <form method="post" wire:submit.prevent="confirm({{ $user->id }})" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center">No Data Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
