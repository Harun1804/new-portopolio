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
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Jenjang" wire:model='position'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Tahun Awal" wire:model='year_from'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Tahun Berakhir" wire:model='year_to'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Kota" wire:model='city'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Nation" wire:model='nation'></th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>POSISI</th>
                                        <th>TAHUN MASUK</th>
                                        <th>TAHUN KELUAR</th>
                                        <th>KOTA</th>
                                        <th>NEGARA</th>
                                        <th>DESKRIPSI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($work_experiences as $workExp)
                                    <tr>
                                        <td class="text-bold-500">{{ $workExp->position }}</td>
                                        <td class="text-bold-500">{{ $workExp->year_from }}</td>
                                        <td class="text-bold-500">{{ $workExp->year_to }}</td>
                                        <td class="text-bold-500">{{ $workExp->city }}</td>
                                        <td class="text-bold-500">{{ $workExp->nation }}</td>
                                        <td class="text-bold-500">
                                            <ul>
                                                @forelse ($workExp->details as $detail)
                                                    <li>{{ $detail->activity }}</li>
                                                @empty
                                                    <li>Not Detail Found</li>
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning d-inline text-white" wire:click="edit({{ $workExp->id }})">Edit</button>
                                            <form method="post" wire:submit.prevent="confirm({{ $workExp->id }})" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" style="text-align: center">No Data Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $work_experiences->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
