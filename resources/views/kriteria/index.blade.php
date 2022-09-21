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

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">nilai</th>
                                            <th scope="col">biaya</th>
                                            <th scope="col">materi</th>
                                            <th scope="col">adab</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriterias as $kriteria)
                                            <tr>
                                                <td>{{ $kriteria->nilai }}</td>
                                                <td>{{ $kriteria->biaya }}</td>
                                                <td>{{ $kriteria->materi }}</td>
                                                <td>{{ $kriteria->adab }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mb-3"
                                                        data-bs-toggle="modal" data-bs-target="#update{{ $kriteria->id }}">
                                                        Edit kriteria
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="update{{ $kriteria->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit kriteria {{ $kriteria->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="/kriteria/update/{{ $kriteria->id }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $kriteria->id }}">
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">Nilai
                                                                        Akademik</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="nilai" value="{{ $kriteria->nilai }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">biaya orang
                                                                        tua</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="biaya" value="{{ $kriteria->biaya }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">penguasaan
                                                                        materi</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="materi" value="{{ $kriteria->materi }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">tata krama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="adab" value="{{ $kriteria->adab }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">input
                                                                    mahasiswa</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- End Vertically centered Modal-->

                                                </div>
                                            </div>
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
