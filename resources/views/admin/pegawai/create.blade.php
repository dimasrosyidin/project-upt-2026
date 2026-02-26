@extends('partials.admin')
@section('title', 'Tambah Pegawai')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Tambah Pegawai</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.pegawai.index') }}">Pegawai</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Tambah Pegawai</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}" placeholder="Nama lengkap pegawai" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                                   value="{{ old('jabatan') }}" placeholder="Jabatan / posisi" required>
                            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" name="urutan" min="1" class="form-control @error('urutan') is-invalid @enderror"
                                   value="{{ old('urutan', 1) }}" required>
                            @error('urutan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/*" onchange="previewFoto(this)">
                            <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div id="fotoPreview" class="mt-2 d-none">
                                <img id="previewImg" src="#" class="rounded-circle" width="80" height="80"
                                     style="object-fit:cover;" alt="Preview">
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('fotoPreview').classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
