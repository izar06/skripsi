@extends('layouts.admin.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kader Posyandu</h1>
    </div>
    <div class="d-sm-flex justify-content-start mb-4">
        <a href="/kader/create" class="btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kader</a>
        <a href="/exportpdf" class="btn-sm btn-primary shadow-sm mx-3">
        <i class="fas fa-plus fa-sm text-white-50"></i> Unduh Data</a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Umur</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $item)
                      <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->nama }}</th>
                        <th>{{ $item->alamat }}</th>
                        <th>{{ $item->umur }}</th>
                        <th>{{ $item->jabatan }}</th>
                        <td>
                            <a href="/kader/edit/{{ $item->id }}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="/kader/delete/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                      @empty
                          <tr>
                            <td colspan="6" class="text-center">
                                Data Kosong
                            </td>
                          </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection