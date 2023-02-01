<section class="section">
    <button class="btn btn-primary btn-sm mb-2" type="button" wire:click='create'>Tambah atau Perbaharui Data</button>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $about->profile }}" class="img-fluid rounded-start" alt="{{ $about->user->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $about->user->name }}</h5>
                            <hr>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="basic-tab" data-bs-toggle="tab"
                                        href="#basic" role="tab" aria-controls="basic"
                                        aria-selected="true">Basic</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="location-tab" data-bs-toggle="tab"
                                        href="#location" role="tab" aria-controls="location"
                                        aria-selected="false">Lokasi</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="desc-tab" data-bs-toggle="tab"
                                        href="#desc" role="tab" aria-controls="desc"
                                        aria-selected="false">Deskripsi</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="basic" role="tabpanel"
                                    aria-labelledby="basic-tab">
                                    <table class="my-2">
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td> : </td>
                                            <td>{{ \Carbon\Carbon::parse($about->date_of_birth)->format('d F Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Situs</td>
                                            <td> : </td>
                                            <td>
                                                <a href="{{ $about->site }}">Situs Web</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td> : </td>
                                            <td>{{ $about->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Freelance Status</td>
                                            <td> : </td>
                                            <td><strong>{{ \Str::upper($about->freelance_status) }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="location" role="tabpanel"
                                    aria-labelledby="location-tab">
                                    <table class="my-2">
                                        <tr>
                                            <td>Kota Asal</td>
                                            <td> : </td>
                                            <td>{{ $about->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Negara Asal</td>
                                            <td> : </td>
                                            <td>{{ $about->nation }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="desc" role="tabpanel"
                                    aria-labelledby="desc-tab">
                                    <p class="mt-2">
                                        {{ $about->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img class="img img-fluid" src="{{ $about->hero }}">
        </div>
    </div>
</section>
