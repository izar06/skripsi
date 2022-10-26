@extends('layouts.admin.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Artikel Posyandu</h1>
        <a href="/article/create" class="btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Article</a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Content</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $item)
                      <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->title }}</th>
                        <th>{{ $item->content}}</th>
                        <th>
                            <img src="{{ asset('storage/'. $item->image) }}" alt="" style="max-height: 100px;">
                        </th>
                        <td>
                            <a href="/article/edit/{{ $item->id }}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="/article/delete/{{ $item->id }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="text-center">
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