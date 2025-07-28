@extends('layouts.app')

@section('content')
<div class="main-banner">

  <div class="owl-carousel owl-banner">
    @foreach($homeBanners as $banner)
@php
    $bg = asset('storage/' . $banner->background_image);
@endphp

<div class="item" style="background-image: url('{{ $bg }}'); background-size: cover; background-position: center;">
        <div class="header-text">
          <span class="category">{{ $banner->location }}, <em>{{ $banner->country }}</em></span>
          <h2>{{ $banner->title_line1 }}<br>{{ $banner->title_line2 }}</h2>
        </div>
      </div>
    @endforeach
  </div>
</div>


@if($featuredsection)
<div class="featured section">
  <div class="container">
    <div class="row">

      {{-- Left Image --}}
      <div class="col-lg-4">
        <div class="left-image">
          <img src="{{ asset('storage/' . $featuredsection->left_image) }}" alt="Featured Image">
            <a href="#"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
            <img src="{{ asset('storage/' . $featuredsection->icon_image) }}" alt="Icon" style="max-width: 60px; padding: 0px;">
          </a>
        </div>
      </div>

      {{-- Middle Section: Heading + Accordions --}}
      <div class="col-lg-5">
        <div class="section-heading">
          <h6>| {{ $featuredsection->subheading ?? 'Featured' }}</h6>
          <h2>{{ $featuredsection->heading ?? 'Best Apartment & Sea View' }}</h2>
        </div>

        @php
           $accordions = json_decode($featuredsection->accordions, true) ?? [];

        @endphp

        <div class="accordion" id="accordionExample">
          @foreach($accordions as $index => $item)
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">
                  {{ $item['title'] ?? 'No Title' }}
                </button>
              </h2>
              <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                   aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  {!! $item['content'] ?? 'No content provided.' !!}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Right Section: Info Table --}}
      <div class="col-lg-3">
        @php
            $infos = json_decode($featuredsection->info_table, true) ?? [];

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
@endif


 <div class="video section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h6>| Video View</h6>
          <h2>{{ $videosection->main_heading ?? 'Get Closer View & Different Feeling' }}</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="video-content py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="video-wrapper position-relative">
          <!-- Thumbnail Image -->
          <img src="{{ asset('storage/' . $videosection->background_image) }}"
               id="thumbnailImage"
               class="img-fluid w-100 rounded"
               alt="Video Thumbnail">

          <!-- Video Element -->
          <video id="customVideo"
                 class="w-100 rounded d-none"
                 controls>
            <source src="{{ asset('storage/' . $videosection->video_file) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>

          <!-- Play Button -->
          <div id="playButton"
               onclick="playVideo()"
               class="position-absolute top-50 start-50 translate-middle"
               style="cursor: pointer; z-index: 10;">
            <i class="fa fa-play-circle" style="font-size: 64px; color: white; text-shadow: 0 0 10px black;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function playVideo() {
    const video = document.getElementById('customVideo');
    const thumbnail = document.getElementById('thumbnailImage');
    const playBtn = document.getElementById('playButton');

    // Hide thumbnail & play button
    thumbnail.classList.add('d-none');
    playBtn.classList.add('d-none');

    // Show video & play
    video.classList.remove('d-none');
    video.play();
  }
</script>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Awwards<br>Won 2023</p>
                </div>
              </div>
            </div>
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
                  <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartment</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                </li>
              </ul>
            </div>

            <div class="tab-content" id="myTabContent">
              {{-- Appartment Tab --}}
              <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
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


 <div class="properties section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h6>| Properties</h6>
          <h2>We Provide The Best Property You Like</h2>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item">
            <a href="#"><img src="{{ asset('storage/' . $property->image) }}" alt=""></a>
            <span class="category">{{ $property->type }}</span>

            <!-- @php
              $price = is_numeric($property->price) ? number_format((float) $property->price) : '0';
              $details = $property->details ?? [];
            @endphp -->

            <h6>{{$property->price }}</h6>
            <h4><a href="#">{{ $property->address }}</a></h4>
            <ul>
              <li>Bedrooms: <span>{{ $details['Bedrooms'] ?? '-' }}</span></li>
              <li>Bathrooms: <span>{{ $details['Bathrooms'] ?? '-' }}</span></li>
              <li>Area: <span>{{ $details['Areas'] ?? '-' }}</span></li>
              <li>Floor: <span>{{ $details['Floor'] ?? '-' }}</span></li>
              <li>Parking: <span>{{ $details['Parkings'] ?? '-' }}</span></li>
            </ul>
            <div class="main-button">
              <a href="#">Schedule a visit</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
  </div>
</div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>{{ $contact->mainheading }}</h6>
            <h2>{{ $contact->subheading }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="{{ asset('assets/images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>{{ $contact->phonenumber }}<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="{{ asset('assets/images/email-icon.png') }}" alt="" style="max-width: 52px;">
             <h6>{{ $contact->email }}<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="{{ route('admin2.messages.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
