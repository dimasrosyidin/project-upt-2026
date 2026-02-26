@extends('partials.admin')
@section('title', 'Profil Pegawai')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Profil Pegawai</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pegawai</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary btn-sm">
                        <i class="ph ph-plus me-1"></i> Tambah Pegawai
                    </a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Urutan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($item->foto)
                                        <img src="{{ asset('images/pegawai/' . $item->foto) }}"
                                             class="rounded-circle" width="50" height="50"
                                             style="object-fit:cover;" alt="{{ $item->nama }}">
                                    @else
                                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center"
                                             style="width:50px;height:50px;">
                                            <i class="ph ph-user text-white fs-4"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->urutan }}</td>
                                <td>
                                    <a href="{{ route('admin.pegawai.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.pegawai.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Hapus pegawai ini?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
