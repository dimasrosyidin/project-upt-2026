@extends('partials.admin')
@section('title', 'Kalkulator Produktivitas')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Kalkulator Produktivitas</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Kalkulator Produktivitas</li>
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
                    <a href="{{ route('admin.kalkulator.create') }}" class="btn btn-primary btn-sm">
                        <i class="ph ph-plus me-1"></i> Tambah Data Kalkulator
                    </a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Tenaga Kerja</th>
                                <th>Total Omzet</th>
                                <th>Produktivitas/TK</th>
                                <th>Rekomendasi TK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pt }}</td>
                                <td>{{ Str::limit($item->alamat_pt, 40) }}</td>
                                <td class="text-center">{{ number_format($item->tenaga_kerja) }}</td>
                                <td>Rp {{ number_format($item->total_omzet, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->produktivitas_per_tk, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $item->rekomendasi_tk > 0 ? 'success' : ($item->rekomendasi_tk < 0 ? 'danger' : 'secondary') }}">
                                        {{ $item->rekomendasi_tk > 0 ? '+' : '' }}{{ number_format($item->rekomendasi_tk) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.kalkulator.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.kalkulator.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Hapus data kalkulator ini?')">
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
