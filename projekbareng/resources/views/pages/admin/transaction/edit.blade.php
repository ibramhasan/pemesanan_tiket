@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Paket travel</h1>
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
          <form action="{{ route('transaction.update', $items->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="transaction_status">Status</label>
              <select class="form-control" name="transaction_status" required>
                <option value="{{ $items->transaction_status }}">
                  Jangan diubah({{ $items->transaction_status}})
                </option>
                <option value="IN_CHART">In Chart</option>
                <option value="IN_CHART">Pending</option>
                <option value="IN_CHART">Success</option>
                <option value="IN_CHART">Cancel</option>
                <option value="IN_CHART">Failed</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
              Edit
            </button>
          </form>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->
@endsection
