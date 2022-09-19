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
                                            <th scope="col">nama</th>
                                            <th scope="col">nilai</th>
                                            <th scope="col">jenis</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriterias as $kriteria)
                                            <tr>
                                                <th scope="row">{{ $kriteria->nama }}</th>
                                                <td>{{ $kriteria->nilai }}</td>
                                                <td>{{ $kriteria->jenis }}</td>
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
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="nama" value="{{ $kriteria->nama }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputText"
                                                                        class="col-sm-2 col-form-label">nilai</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="nilai" value="{{ $kriteria->nilai }}"">
                                                                    </div>
                                                                </div>
                                                                <fieldset class="row mb-3">
                                                                    <legend class="col-form-label col-sm-2 pt-0">Jenis
                                                                    </legend>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jenis" id="gridRadios1"
                                                                                value="cost">
                                                                            <label class="form-check-label"
                                                                                for="gridRadios1">
                                                                                cost
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jenis" id="gridRadios2"
                                                                                value="benefit">
                                                                            <label class="form-check-label"
                                                                                for="gridRadios2">
                                                                                benefit
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
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
