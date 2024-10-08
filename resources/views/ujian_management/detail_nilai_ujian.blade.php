@extends('layouts.app')

@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukkan Nilai Ujian Siswa</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('detail-nilai-ujian', ['id' => $kode_kelas]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">Pilih Semester</label>
                                    <select class="form-select" id="basicSelect" name="semester">
                                        <option disabled selected>Pilih Semester</option>
                                        <option value="1(Ganjil)">1(Ganjil)</option>
                                        <option value="2(Genap)">2(Genap)</option>
                                    </select>
                                    @error('semester')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicSelect">Siswa</label>
                                        <select class="form-select" id="basicSelect" name="kode_siswa">
                                            <option disabled selected>Pilih Siswa</option>
                                            @foreach ($siswa as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_siswa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('kode_siswa')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicSelect">Mata Pelajaran</label>
                                        <select class="form-select" id="basicSelect" name="kode_pelajaran">
                                            <option disabled selected>Pilih Mata Pelajaran</option>
                                            @foreach ($pelajaran as $data)
                                                <option value="{{ $data->id }}">{{ $data->mata_pelajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('kode_pelajaran')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicSelect">Guru Pengajar</label>
                                        <select class="form-select" id="basicSelect" name="kode_guru">
                                            <option disabled selected>Pilih Mata Pelajaran</option>
                                            @foreach ($guru as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('kode_guru')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicSelect">Nilai</label>
                                        <input value="{{ old('nilai') }}" type="number" id="first-name"
                                            class="form-control text-lowercase" name="nilai"
                                            placeholder="Masukkan Nilai Siswa" />
                                    </div>
                                    @error('nilai')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-floating mt-1">
                                      <textarea
                                        data-length="255"
                                        class="form-control char-textarea"
                                        id="textarea-counter"
                                        rows="3"
                                        placeholder="Counter"
                                        style="height: 100px"
                                        name="desk_pengetahuan"
                                      ></textarea>
                                      <label for="textarea-counter">Deskripsi Pengetahuan</label>
                                    </div>
                                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 255 </small>
                                    @error('desk_pengetahuan')
                                        <div class="text-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12"></div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-1 mt-1">
                                      <textarea
                                        data-length="255"
                                        class="form-control char-textarea"
                                        id="textarea-counter"
                                        rows="3"
                                        placeholder="Counter"
                                        style="height: 100px"
                                        name="desk_keterampilan"
                                      ></textarea>
                                      <label for="textarea-counter">Deskripsi Keterampilan</label>
                                    </div>
                                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 255 </small>
                                    @error('desk_keterampilan')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-8" style="margin-top: -200px;"> <!-- Gaya inline untuk mengangkat card sedikit ke atas -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Keterangan Predikat Nilai</h4>
                                        </div>
                                        <div class="card-body" style="padding-bottom: 0;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nilai</th>
                                                        <th>Predikat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Emerging</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Developing</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Proficient</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Extending</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-1">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
