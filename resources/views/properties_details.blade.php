@extends('layouts.app')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Single Property</span>
                    <h3>Single Property</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="main-image">
                        <img src="assets/images/single-property.jpg" alt="">
                    </div>
                    <div class="main-content">
                        <span class="category">{{ $properties->type }}</span>
                        <h4>{{ $properties->address }}</h4>
                        <p>{{ $properties->specification }}</p>
                    </div>
                </div>
                 {{-- Right Section: Info Table --}}
       <div class="col-lg-3">
        @php
            $infos = json_decode($infos->info_table, true) ?? [];

        @endphp
        <div class="info-table">
          <ul>
            @foreach($infos as $info)
              <li>
                <img src="{{ isset($info['icon']) ? asset('storage/' . $info['icon']) : asset('assets/images/default-icon.png') }}" alt="icon" style="max-width: 52px;">
                <h4>{{ $info['key'] ?? 'Key Missing' }}<br><span>{{ $info['value'] ?? 'Value Missing' }}</span></h4>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
            </div>
        </div>
    </div>




    <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6> {{ $bestdealsection->heading ?? 'Best Deal' }}</h6>
                        <h2> {{ $bestdealsection->subheading ?? 'Find Your Best Deal Right Now!' }}</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                            data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment"
                                            aria-selected="true">Appartment</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa"
                                            type="button" role="tab" aria-controls="villa" aria-selected="false">Villa
                                            House</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                            data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse"
                                            aria-selected="false">Penthouse</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                {{-- Appartment Tab --}}
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                    aria-labelledby="appartment-tab">
                                    @foreach($appartmentDeals as $deal)
                                        <div class="row mb-5">
                                            <div class="col-lg-3">
                                                <div class="info-table">
                                                    <ul>
                                                        @foreach(json_decode($deal->details, true) as $d)
                                                            <li>{{ $d['key'] }} <span>{{ $d['value'] }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{ asset('storage/' . $deal->image) }}" alt="">
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>{{ $deal->heading }}</h4>
                                                <p>{{ $deal->description }}</p>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Villa Tab --}}
                                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                    @foreach($villaDeals as $deal)
                                        <div class="row mb-5">
                                            <div class="col-lg-3">
                                                <div class="info-table">
                                                    <ul>
                                                        @foreach(json_decode($deal->details, true) as $d)
                                                            <li>{{ $d['key'] }} <span>{{ $d['value'] }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{ asset('storage/' . $deal->image) }}" alt="">
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>{{ $deal->heading }}</h4>
                                                <p>{{ $deal->description }}</p>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Penthouse Tab --}}
                                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                                    @foreach($penthouseDeals as $deal)
                                        <div class="row mb-5">
                                            <div class="col-lg-3">
                                                <div class="info-table">
                                                    <ul>
                                                        @foreach(json_decode($deal->details, true) as $d)
                                                            <li>{{ $d['key'] }} <span>{{ $d['value'] }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{ asset('storage/' . $deal->image) }}" alt="">
                                            </div>
                                            <div class="col-lg-3">
                                                <h4>{{ $deal->heading }}</h4>
                                                <p>{{ $deal->description }}</p>
                                                <div class="icon-button">
                                                    <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
