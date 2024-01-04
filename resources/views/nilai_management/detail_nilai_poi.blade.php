@extends('layouts.app')

@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukkan Nilai POI Siswa</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('detail-nilai-poi', ['id' => $kode_kelas]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">Nama Siswa</label>
                                    <select class="form-select" id="basicSelect" name="kode_siswa">
                                        <option disabled selected>Pilih Siswa</option>
                                        @foreach ($siswa as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                    @error('kode_siswa')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
                                <!-- Tambahkan Kategori-Kategori Penilaian -->
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">PRINCIPLED - MANDIRI</label>
                                    <select class="form-select" name="nilai_principled">
                                        <option value="1">1 (Emerging atau Mendasar)</option>
                                        <option value="2">2 (Developing atau Berkembang)</option>
                                        <option value="3">3 (Proficient atau Mahir)</option>
                                        <option value="4">4 (Extending atau Luar Biasa)</option>
                                    </select>
                                    @error('nilai_principled')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">BALANCED - BERIMAN, BERTAQWA KEPADA TUHAN YME DAN BERBUDI LUHUR</label>
                                    <select class="form-select" name="nilai_balanced">
                                        <option value="1">1 (Emerging atau Mendasar)</option>
                                        <option value="2">2 (Developing atau Berkembang)</option>
                                        <option value="3">3 (Proficient atau Mahir)</option>
                                        <option value="4">4 (Extending atau Luar Biasa)</option>
                                    </select>
                                    @error('nilai_balanced')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">SKILL</label>
                                    <select class="form-select" name="nilai_skill">
                                        <option value="1">1 (Emerging atau Mendasar)</option>
                                        <option value="2">2 (Developing atau Berkembang)</option>
                                        <option value="3">3 (Proficient atau Mahir)</option>
                                        <option value="4">4 (Extending atau Luar Biasa)</option>
                                    </select>
                                    @error('nilai_skill')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="fp-default">PRODUCT</label>
                                    <select class="form-select" name="nilai_product">
                                        <option value="1">1 (Emerging atau Mendasar)</option>
                                        <option value="2">2 (Developing atau Berkembang)</option>
                                        <option value="3">3 (Proficient atau Mahir)</option>
                                        <option value="4">4 (Extending atau Luar Biasa)</option>
                                    </select>
                                    @error('nilai_product')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-1 mt-1">
                                        <textarea
                                            data-length="1000"
                                            class="form-control char-textarea"
                                            id="textarea-counter-indo"
                                            rows="3"
                                            placeholder="Counter"
                                            style="height: 100px"
                                            name="comment_indonesian"
                                        ></textarea>
                                        <label for="textarea-counter-indo">Komentar Guru (Bahasa Indonesia)</label>
                                        <small class="textarea-counter-value float-end"><span id="char-count-indo">0</span> </small>
                                        @error('comment_indonesian')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-1 mt-1">
                                        <textarea
                                            data-length="1000"
                                            class="form-control char-textarea"
                                            id="textarea-counter-ing"
                                            rows="3"
                                            placeholder="Counter"
                                            style="height: 100px"
                                            name="comment_english"
                                        ></textarea>
                                        <label for="textarea-counter-ing">Komentar Guru (Bahasa Inggris)</label>
                                        <small class="textarea-counter-value float-end"><span id="char-count-ing">0</span> </small>
                                        @error('comment_english')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Akhir Kategori-Kategori Penilaian -->

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

    <script>
        function updateCharCount(textareaId, charCountSpanId, maxChars) {
        var textarea = document.getElementById(textareaId);
        var charCountSpan = document.getElementById(charCountSpanId);

        if (textarea && charCountSpan) {
            var currentLength = textarea.value.length;
            charCountSpan.innerText = currentLength + ' / ' + maxChars;
            }
        }

        // Memastikan karakter awal diatur dengan benar
        document.addEventListener('DOMContentLoaded', function() {
            updateCharCount('textarea-counter-indo', 'char-count-indo', 1000);
            updateCharCount('textarea-counter-ing', 'char-count-ing', 1000);
        });

        // Menangani perubahan pada area teks Bahasa Indonesia
        document.getElementById('textarea-counter-indo').addEventListener('input', function() {
            updateCharCount('textarea-counter-indo', 'char-count-indo', 1000);
        });

        // Menangani perubahan pada area teks Bahasa Inggris
        document.getElementById('textarea-counter-ing').addEventListener('input', function() {
            updateCharCount('textarea-counter-ing', 'char-count-ing', 1000);
        });
    </script>
@endsection
