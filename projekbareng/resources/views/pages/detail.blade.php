@extends('layouts.app')
@section('title', 'Lihat Detail')
@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Paket Travel
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1>{{$items->title}}</h1>
            <p>
              {{ $items->lokasi }}
            </p>
            @if($items->galleries->count())
            <div class="gallery">
              <div class="xzoom-container">
                <img
                  class="xzoom"
                  id="xzoom-default"
                  src="{{ Storage::url($items->galleries->first()->image) }}"
                  xoriginal="{{ Storage::url($items->galleries->first()->image) }}"
                />
                <div class="xzoom-thumbs">
                  @foreach($items->galleries as $gallery)
                  <a href="{{ Storage::url($gallery->image) }}">
                    <img class="xzoom-gallery" width="128" src="{{ Storage::url($gallery->image) }}" xpreview="{{ Storage::url($gallery->image) }}"/>
                  </a>
                  @endforeach
                </div>
              </div>
              <h2>Tentang Wisata</h2>
              <p>
                {{$items->about}}
              </p>
              <div class="features row pt-3">
                <div class="col-md-4">
                  <img
                    src="{{ url('frontend/images/ic_event.png') }}"
                    alt=""
                    class="features-image"
                  />
                  <div class="description">
                    <h3>Featured Ticket</h3>
                    <p>{{ $items->featured_event}}</p>
                  </div>
                </div>
                <div class="col-md-4 border-left">
                  <img
                    src="{{ url('frontend/images/ic_bahasa.png') }}"
                    alt=""
                    class="features-image"
                  />
                  <div class="description">
                    <h3>Language</h3>
                    <p>{{ $items->language}}</p>
                  </div>
                </div>
                <div class="col-md-4 border-left">
                  <img
                    src="{{ url('frontend/images/ic_foods.png') }}"
                    alt=""
                    class="features-image"
                  />
                  <div class="description">
                    <h3>Foods</h3>
                    <p>{{ $items->foods}}</p>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Members are going</h2>
            <div class="members my-2">
              <img src="{{ url('frontend/images/members.png') }}" alt="" class="w-75" />
            </div>
            <hr />
            <h2>Trip Informations</h2>
            <table class="trip-informations">
              <tr>
                <th width="50%">Date of Departure</th>
                <td width="50%" class="text-right">{{ \Carbon\Carbon::create($items->date_of_departure)->format('F n, Y')}}</td>
              </tr>
              <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-right">{{ $items->duration }}</td>
              </tr>
              <tr>
                <th width="50%">Type</th>
                <td width="50%" class="text-right">{{$items->type}}</td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">{{ $items->price }} / person</td>
              </tr>
            </table>
          </div>
          <div class="join-container">
            @auth
            <form class="" action="{{route('checkout_process', $items->id) }}" method="post">
              @csrf
              <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">Register Untuk Join!</button>
            </form>
            @endauth
            @guest
              <a href="{{route('register')}}" class="btn btn-block btn-join-now mt-3 py-2"></a>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/dist/xzoom.css') }}"/>
@endpush
@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 1000,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
@endpush
