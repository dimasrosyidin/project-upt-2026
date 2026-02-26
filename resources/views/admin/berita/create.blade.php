@extends('partials.admin')
@section('title', 'Tambah Berita')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Tambah Berita</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Tambah Berita</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul') }}" placeholder="Judul berita" required>
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Narasi / Isi Berita <span class="text-danger">*</span></label>
                            <textarea name="narasi" rows="8"
                                      class="form-control @error('narasi') is-invalid @enderror"
                                      placeholder="Tulis isi berita di sini..." required>{{ old('narasi') }}</textarea>
                            @error('narasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/*" onchange="previewFoto(this)">
                            <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div id="fotoPreview" class="mt-2 d-none">
                                <img id="previewImg" src="#" class="img-thumbnail" style="max-height:200px;" alt="Preview">
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
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
