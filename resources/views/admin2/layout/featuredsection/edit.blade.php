@extends('admin2.layout.index')

@section('title', 'Edit Featured Section')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">
  <div class="row">

    <!-- Edit Featured Section Form -->
    <div class="col-md-6 mb-4">
      <div class="form-container">
        <div class="card-body">

          <h5 class="card-title text-primary mb-4">✏️ Edit Featured Section</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('admin2.featured.update', $featured->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label">Heading</label>
              <input type="text" name="heading" class="form-control" value="{{ $featured->heading }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Subheading</label>
              <input type="text" name="subheading" class="form-control" value="{{ $featured->subheading }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Left Image</label>
              <input type="file" name="left_image" class="form-control">
              @if($featured->left_image)
                <div class="mt-2">
                  <img src="{{ asset('storage/' . $featured->left_image) }}" width="100" class="rounded shadow-sm">
                </div>
              @endif
            </div>

            <div class="mb-3">
              <label class="form-label">Icon Image</label>
              <input type="file" name="icon_image" class="form-control">
              @if($featured->icon_image)
                <div class="mt-2">
                  <img src="{{ asset('storage/' . $featured->icon_image) }}" width="70" class="rounded shadow-sm">
                </div>
              @endif
            </div>

            <!-- Accordion Section -->
            @php
              $accordionData = json_decode($featured->accordions, true) ?? [];
            @endphp
            <div class="mb-3">
              <label class="form-label">Why Choose Us (3 Questions)</label>
              @for($i = 0; $i < 3; $i++)
              <div class="border p-2 rounded mb-2">
                <input type="text" name="accordion_titles[]" class="form-control mb-2"
                       placeholder="Question {{ $i+1 }} Title"
                       value="{{ $accordionData[$i]['title'] ?? '' }}" required>
                <textarea name="accordion_contents[]" class="form-control" rows="2"
                          placeholder="Question {{ $i+1 }} Answer" required>{{ $accordionData[$i]['content'] ?? '' }}</textarea>
              </div>
              @endfor
            </div>

            <!-- Info Table Section -->
            @php
              $infoData = json_decode($featured->info_table, true) ?? [];
            @endphp
            <div class="mb-3">
              <label class="form-label">Info Table Entries</label>
              @for($i = 0; $i < 4; $i++)
              <div class="input-group mb-2">
                <input type="file" name="info_icons[]" class="form-control">
                <input type="text" name="info_keys[]" class="form-control" placeholder="Key" value="{{ $infoData[$i]['key'] ?? '' }}" required>
                <input type="text" name="info_values[]" class="form-control" placeholder="Value" value="{{ $infoData[$i]['value'] ?? '' }}" required>
              </div>
              @if(!empty($infoData[$i]['icon']))
              <div class="mb-2">
                <img src="{{ asset('storage/' . $infoData[$i]['icon']) }}" width="40">
              </div>
              @endif
              @endfor
            </div>

            <button type="submit" class="btn btn-primary w-100">🔄 Update Section</button>
          </form>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection
