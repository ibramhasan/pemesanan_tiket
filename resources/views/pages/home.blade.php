@extends('layouts.app')
@section('title')
@section('content')
<header class="text-center">

</header>
<main>
  <div class="container rounded-circle">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Members</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Countries</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>3K</h2>
        <p>Hotels</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>
  <section class="section-popular" id="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h1 class="display-4">Wisata Terpopuler</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="section-popular-content " id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        @foreach($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="card-travel text-center d-flex flex-column shadow p-3 mb-5 bg-white rounded"
          style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}')">
            <div class="travel-country">{{$item->lokasi}}</div>
            <div class="travel-location">({{$item->title}})</div>
            <div class="travel-button mt-auto">
              <a href="{{ route('detail', $item->slug ) }}" class="btn btn-outline-success">
                View Details
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="section-networks" id="networks">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Our Networks</h2>
          <p>
            Companies are trusted us
            <br />
            more than just a trip
          </p>
        </div>
        <div class="col-md-8 text-center">
          <img src="{{ url('frontend/images/partner.png') }}" class="img-patner" />
        </div>
      </div>
    </div>
  </section>
  <section class="section-testimonials-heading" id="testimonialsHeading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>They Are Loving Us</h2>
          <p>
            Moments were giving them
            <br/>
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="section-testimonials-content" id="testimonialsContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center match-height">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img
                src="{{ url('frontend/images/avatar-2.png') }}"
                alt=""
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Rian Ayatullah</h3>
              <p class="testimonials">
                The trip was amazing and I saw something beautiful in that Island that makes me want to learn more
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Banten</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img
                src="{{ url('frontend/images/avatar-2.png') }}"
                alt=""
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Shayna</h3>
              <p class="testimonials">
                “ The trip was amazing and I saw something beautiful in that
                Island that makes me want to learn more “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Bali</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content mb-auto">
              <img src="frontend/images/avatar-3.png" alt="" class="mb-4 rounded-circle"/>
              <h3 class="mb-4">Shabrina</h3>
              <p class="testimonials">“ I loved it when the waves was shaking harder — I was scared too “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Yogyakarta</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
            I Need Help
          </a>
          <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
            Get Started
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
