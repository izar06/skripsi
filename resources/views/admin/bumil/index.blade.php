@extends('layouts.admin.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 d-flex align-items-start">Data Ibu Hamil</h1>
    </div>
    <div class="d-sm-flex justify-content-start mb-4">
        <a href="/bumil/create" class="btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Ibu Hamil</a>
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
                            <th>Nama Ibu</th>
                            <th>NIK</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Masa Kehamilan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $item)
                      <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->nama_ibu}}</th>
                        <th>{{ $item->NIK }}</th>
                        <th>{{ $item->umur }}</th>
                        <th>{{ $item->alamat }}</th>
                        <th>{{ $item->masa_kehamilan }}</th>
                        <td>
                            <a href="/bumil/edit/{{ $item->id }}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="/bumil/delete/{{ $item->id }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center">
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