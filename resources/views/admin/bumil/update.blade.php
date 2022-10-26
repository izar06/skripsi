@extends('layouts.admin.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Kader</h1>
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
            <form action="/bumil/update/{{ $item->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="{{ $item->nama_ibu }}">
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" placeholder="NIK" value="{{ $item->NIK }}">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" name="umur" placeholder="Umur" value="{{ $item->umur }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ $item->alamat }}">
                </div>
                <div class="form-group">
                    <label for="masa_kehamilan">Masa Kehamilan</label>
                    <input type="text" class="form-control" name="masa_kehamilan" placeholder="Masa Kehamilan" value="{{ $item->masa_kehamilan }}">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Ubah</button>
            </form>
        </div>
    </div>
</div>
@endsection