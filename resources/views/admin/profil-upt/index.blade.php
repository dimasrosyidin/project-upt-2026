@extends('partials.admin')
@section('title', 'Profil UPT')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Profil UPT</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Profil UPT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.profil-upt.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row gy-4">

            {{-- Struktur Organisasi --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-diagram-three me-2"></i>Struktur Organisasi</h5></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Upload Gambar Struktur Organisasi</label>
                                <input type="file" name="foto_struktur" class="form-control" accept="image/*" id="foto-struktur-input">
                                <small class="text-muted">Format: JPG, PNG. Maks 5MB</small>
                            </div>
                            <div class="col-md-6 text-center">
                                @if($data->foto_struktur)
                                    <p class="text-muted mb-1">Gambar saat ini:</p>
                                    <img src="{{ asset('images/profil/' . $data->foto_struktur) }}"
                                         class="img-fluid rounded shadow" style="max-height:200px;"
                                         alt="Struktur Organisasi">
                                @else
                                    <div class="alert alert-info">Belum ada gambar struktur organisasi.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tugas dan Fungsi --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-list-checks me-2"></i>Tugas dan Fungsi</h5></div>
                    <div class="card-body">
                        <label class="form-label fw-semibold">Teks Tugas dan Fungsi</label>
                        <textarea name="tugas_fungsi" class="form-control" rows="10"
                            placeholder="Masukkan teks tugas dan fungsi UPT...">{{ old('tugas_fungsi', $data->tugas_fungsi) }}</textarea>
                        <small class="text-muted">Gunakan baris baru untuk memisahkan poin-poin.</small>
                    </div>
                </div>
            </div>

            {{-- Visi Misi --}}
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-eye me-2"></i>Visi</h5></div>
                    <div class="card-body">
                        <textarea name="visi" class="form-control" rows="6"
                            placeholder="Masukkan teks visi UPT...">{{ old('visi', $data->visi) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-target me-2"></i>Misi</h5></div>
                    <div class="card-body">
                        <textarea name="misi" class="form-control" rows="6"
                            placeholder="Masukkan teks misi UPT...">{{ old('misi', $data->misi) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="ph ph-floppy-disk me-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
