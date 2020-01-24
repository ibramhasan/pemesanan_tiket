@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Foto</h1>
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
  <div class="col-sm-8 justify-content-center">
    <div class="card shadow">
      <div class="card-body">
          <form action="{{ route('Gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="travel_paket_id"> Paket Travel</label>
              <select class="form-control" name="travel_paket_id" required>
                <option value="">Pilih Paket</option>
                @foreach($travel_relasi as $travel_packetages)
                <option value="{{ $travel_packetages->id}}">
                  {{$travel_packetages->title }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="image">Foto</label>
              <input type="file" name="image" placeholder="Masukkan Gambar!" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">
              Save
            </button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
