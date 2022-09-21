@extends('layouts.main')

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Mahasiswa Berprestasi </h5>

                                @if (session()->has('success'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        {{ session()->get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <!-- Vertically centered Modal -->
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#verticalycentered">
                                    Input Mahasiswa
                                </button>
                                <div class="modal fade" id="verticalycentered" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Input Mahasiswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="/mahasiswa/store" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">nim</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nim">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText"
                                                            class="col-sm-2 col-form-label">akademik</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="akademik">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">biaya</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="biaya">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText"
                                                            class="col-sm-2 col-form-label">materi</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="materi">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">adab</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="adab">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">input mahasiswa</button>
                                                </div>
                                            </form>
                                        </div><!-- End Vertically centered Modal-->

                                    </div>
                                </div>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Nim</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $mahasiswa->nim }}</td>
                                                <td>{{ $mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->total }}</td>
                                                <td>
                                                    <form method="post" action="/mahasiswa/delete/{{ $mahasiswa->id }}">
                                                        @csrf
                                                        <button type="button" class="btn btn-primary mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#update{{ $mahasiswa->id }}">
                                                            Edit data
                                                        </button>
                                                        <button type="submit" class="btn btn-danger mb-3"
                                                            data-bs-toggle="modal">
                                                            delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="update{{ $mahasiswa->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit data {{ $mahasiswa->id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/mahasiswa/update/{{ $mahasiswa->id }}"
                                                            method="post">
                                                            @csrf
                                                            @foreach ($asli as $item)
                                                                @if ($item->id == $mahasiswa->id)
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $mahasiswa->id }}">
                                                                    <div class="modal-body">
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">nim
                                                                            </label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="nim"
                                                                                    value="{{ $mahasiswa->nim }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">nama
                                                                            </label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="nama"
                                                                                    value="{{ $mahasiswa->nama }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">nilai
                                                                                Akademik</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="akademik"
                                                                                    value="{{ $item->akademik }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">biaya
                                                                            </label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="biaya"
                                                                                    value="{{ $item->biaya }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">materi
                                                                            </label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="materi"
                                                                                    value="{{ $item->materi }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="inputText"
                                                                                class="col-sm-2 col-form-label">adab
                                                                            </label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    name="adab"
                                                                                    value="{{ $item->adab }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">edit
                                                                            data</button>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </form>
                                                    </div><!-- End Vertically centered Modal-->

                                                </div>
                                            </div>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
