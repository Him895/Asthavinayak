@extends('layouts.app')

@section('content')

 <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
          <h3>Properties</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
     <ul class="properties-filter">

    <li><a href="{{ route('apartmentfillter') }}" class="{{ Request::is('apartment') ? 'is_active' : '' }}">Apartment</a></li>
    <li><a href="{{ route('villafillter') }}" class="{{ Request::is('villa') ? 'is_active' : '' }}">Villa House</a></li>
    <li><a href="{{ route('penthousefillter') }}" class="{{ Request::is('penthouse') ? 'is_active' : '' }}">Penthouse</a></li>
</ul>

      <div class="row properties-box">
        @foreach($properties as $property)
<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
          <div class="item">
 <a href="#"><img src="{{ asset('storage/' . $property->image) }}" alt=""></a>
             <span class="category">{{ $property->type }}</span>
            <h6>{{$property->price }}</h6>
            <h4><a href="#">{{ $property->address }}</a></h4>
             <ul>
              <li>Bedrooms: <span>{{$property->details['Bedrooms'] ?? '-' }}</span></li>
              <li>Bathrooms: <span>{{$property->details['Bathrooms'] ?? '-' }}</span></li>
              <li>Area: <span>{{$property->details['Areas'] ?? '-' }}</span></li>
              <li>Floor: <span>{{$property->details['Floor'] ?? '-' }}</span></li>
              <li>Parking: <span>{{$property->details['Parkings'] ?? '-' }}</span></li>
            </ul>

            <div class="main-button">
              <a href="#">Schedule a visit</a>
            </div>
          </div>
        </div>
          @endforeach
          </div>

      <div class="row">
  <div class="col-lg-12">
    {{ $properties->links('vendor.pagination.custom') }}
  </div>
</div>

    </div>
  </div>



@endsection
