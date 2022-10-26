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
            <form action="/article/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" cols="20" rows="5" class="form-control">{{ $item->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                    <img src="{{ asset('storage/'. $item->image) }}" alt="" style="max-height: 200px;" class="mb-2 d-block">
                    <input type="file" class="form-control" name="image" placeholder="image" value="{{ old('image') }}">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Ubah</button>
            </form>
        </div>
    </div>
</div>
@endsection