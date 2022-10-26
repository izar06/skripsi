@extends('layouts.admin.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kader</h1>
    </div>


   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>    
   @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="/kader/update/{{ $item->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $item->nama }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ $item->alamat }}">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" name="umur" placeholder="Umur" value="{{ $item->umur }}">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ $item->jabatan }}">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Ubah</button>
            </form>
        </div>
    </div>
</div>
@endsection