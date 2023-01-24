<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th><input type="text" class="form-control"
                                                placeholder="Pencarian Berdasarkan Nama"></th>
                                        <th><input type="text" class="form-control"
                                                placeholder="Pencarian Berdasarkan Pekerjaan"></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>PEKERJAAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td class="text-bold-500">{{ ucfirst($user->name) }}</td>
                                        <td class="text-bold-500">
                                            <div class="list-group">
                                                @foreach ($user->jobs as $job)
                                                    <form method="POST" wire:submit.prevent="confirm({{ $user }},{{ $job->id }})">
                                                        @csrf
                                                        <button type="submit" class="list-group-item list-group-item-action">
                                                            {{ $job->name }}
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                wire:click='create({{ $user->id }})'>Tambah</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" style="text-align: center">No Data Found</td>
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
