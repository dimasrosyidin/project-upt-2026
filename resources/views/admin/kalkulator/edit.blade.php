@extends('partials.admin')
@section('title', 'Edit Kalkulator')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Edit Data Kalkulator Produktivitas</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.kalkulator.index') }}">Kalkulator</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Edit Data Kalkulator</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.kalkulator.update', $data->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pt" class="form-control @error('nama_pt') is-invalid @enderror"
                                       value="{{ old('nama_pt', $data->nama_pt) }}" required>
                                @error('nama_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jumlah Tenaga Kerja <span class="text-danger">*</span></label>
                                <input type="number" name="tenaga_kerja" min="1" class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                       value="{{ old('tenaga_kerja', $data->tenaga_kerja) }}" required>
                                @error('tenaga_kerja') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Perusahaan <span class="text-danger">*</span></label>
                            <textarea name="alamat_pt" rows="2"
                                      class="form-control @error('alamat_pt') is-invalid @enderror"
                                      required>{{ old('alamat_pt', $data->alamat_pt) }}</textarea>
                            @error('alamat_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <hr>
                        <h6 class="fw-bold mb-3"><i class="ph ph-chart-line me-1"></i> Data Omzet Per Bulan (Rp)</h6>
                        @php
                            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        @endphp
                        <div class="row">
                            @foreach($bulan as $i => $namaBulan)
                            @php $fieldName = 'omzet_'.($i+1); @endphp
                            <div class="col-md-4 col-lg-3 mb-3">
                                <label class="form-label fw-semibold">{{ $namaBulan }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="{{ $fieldName }}" min="0"
                                           class="form-control @error($fieldName) is-invalid @enderror"
                                           value="{{ old($fieldName, $data->$fieldName) }}" oninput="hitungTotal()">
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="alert alert-info mt-2">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="fw-bold">Total Omzet Setahun</div>
                                    <div class="fs-5" id="totalOmzet">Rp {{ number_format($data->total_omzet, 0, ',', '.') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Produktivitas per TK</div>
                                    <div class="fs-5" id="prodPerTk">Rp {{ number_format($data->produktivitas_per_tk, 0, ',', '.') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Rekomendasi TK (± 20%)</div>
                                    <div class="fs-5" id="rekomendasiTk">{{ $data->rekomendasi_tk > 0 ? '+'.$data->rekomendasi_tk : $data->rekomendasi_tk }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Update
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
    const rekTambah = Math.round((prodPerTk * 0.2) / prodPerTk);

    document.getElementById('totalOmzet').textContent = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('prodPerTk').textContent = 'Rp ' + Math.round(prodPerTk).toLocaleString('id-ID');
    document.getElementById('rekomendasiTk').textContent = rekTambah > 0 ? '+' + rekTambah : rekTambah;
}
document.querySelector('[name="tenaga_kerja"]')?.addEventListener('input', hitungTotal);
</script>
@endpush
@endsection
