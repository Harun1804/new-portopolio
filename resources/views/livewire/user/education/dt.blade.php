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
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Jenjang" wire:model='level'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Jurusan" wire:model='major'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Tahun Masuk" wire:model='year_in'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Tahun Keluar" wire:model='year_out'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan University" wire:model='university'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Kota" wire:model='city'></th>
                                        <th><input type="text" class="form-control" placeholder="Pencarian Berdasarkan Nation" wire:model='nation'></th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>JENJANG</th>
                                        <th>JURUSAN</th>
                                        <th>TAHUN MASUK</th>
                                        <th>TAHUN KELUAR</th>
                                        <th>UNIVERSITY</th>
                                        <th>KOTA</th>
                                        <th>NEGARA</th>
                                        <th>DESKRIPSI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($educations as $education)
                                    <tr>
                                        <td class="text-bold-500">{{ $education->level }}</td>
                                        <td class="text-bold-500">{{ $education->major }}</td>
                                        <td class="text-bold-500">{{ $education->year_in }}</td>
                                        <td class="text-bold-500">{{ $education->year_out }}</td>
                                        <td class="text-bold-500">{{ $education->university }}</td>
                                        <td class="text-bold-500">{{ $education->city }}</td>
                                        <td class="text-bold-500">{{ $education->nation }}</td>
                                        <td class="text-bold-500">{{ $education->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning d-inline text-white" wire:click="edit({{ $education->id }})">Edit</button>
                                            <form method="post" wire:submit.prevent="confirm({{ $education->id }})" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" style="text-align: center">No Data Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $educations->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
