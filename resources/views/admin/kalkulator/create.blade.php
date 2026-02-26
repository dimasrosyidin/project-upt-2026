@extends('partials.admin')
@section('title', 'Tambah Data Kalkulator')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Tambah Data Kalkulator Produktivitas</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.kalkulator.index') }}">Kalkulator</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Input Data Kalkulator</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.kalkulator.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pt" class="form-control @error('nama_pt') is-invalid @enderror"
                                       value="{{ old('nama_pt') }}" placeholder="Nama PT/CV/UD" required>
                                @error('nama_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jumlah Tenaga Kerja <span class="text-danger">*</span></label>
                                <input type="number" name="tenaga_kerja" min="1" class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                       value="{{ old('tenaga_kerja') }}" placeholder="Jumlah TK" required>
                                @error('tenaga_kerja') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Perusahaan <span class="text-danger">*</span></label>
                            <textarea name="alamat_pt" rows="2"
                                      class="form-control @error('alamat_pt') is-invalid @enderror"
                                      placeholder="Alamat lengkap perusahaan" required>{{ old('alamat_pt') }}</textarea>
                            @error('alamat_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <hr>
                        <h6 class="fw-bold mb-3"><i class="ph ph-chart-line me-1"></i> Data Omzet Per Bulan (Rp)</h6>
                        @php
                            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        @endphp
                        <div class="row">
                            @foreach($bulan as $i => $namaBulan)
                            <div class="col-md-4 col-lg-3 mb-3">
                                <label class="form-label fw-semibold">{{ $namaBulan }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="omzet_{{ $i+1 }}" min="0"
                                           class="form-control @error('omzet_'.($i+1)) is-invalid @enderror"
                                           value="{{ old('omzet_'.($i+1), 0) }}" oninput="hitungTotal()">
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="alert alert-info mt-2">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="fw-bold">Total Omzet Setahun</div>
                                    <div class="fs-5" id="totalOmzet">Rp 0</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Produktivitas per TK</div>
                                    <div class="fs-5" id="prodPerTk">Rp 0</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Rekomendasi TK (± 20%)</div>
                                    <div class="fs-5" id="rekomendasiTk">0</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.kalkulator.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
function hitungTotal() {
    let total = 0;
    for (let i = 1; i <= 12; i++) {
        const val = parseFloat(document.querySelector(`[name="omzet_${i}"]`).value) || 0;
        total += val;
    }
    const tk = parseInt(document.querySelector('[name="tenaga_kerja"]').value) || 1;
    const prodPerTk = total / tk;
    const standarProd = prodPerTk;
    const rekTambah = Math.round((standarProd * 0.2) / prodPerTk);

    document.getElementById('totalOmzet').textContent = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('prodPerTk').textContent = 'Rp ' + Math.round(prodPerTk).toLocaleString('id-ID');
    document.getElementById('rekomendasiTk').textContent = rekTambah > 0 ? '+' + rekTambah : rekTambah;
}
document.querySelector('[name="tenaga_kerja"]')?.addEventListener('input', hitungTotal);
</script>
@endpush
@endsection
