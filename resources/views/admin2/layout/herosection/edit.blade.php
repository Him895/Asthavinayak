@extends('admin2.layout.index')

@section('content')

<div class="container py-4" style="margin-top: 80px;"> <!-- 👈 MARGIN FIX -->
  <div class="card shadow-sm border-0">
       <div class="card-body form-container"> <!-- 👈 Just make sure this class is there -->
      <h5 class="card-title text-primary mb-4">✏️ Edit Home Banner</h5>

      <form action="{{ route('admin2.home-banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Location -->
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $banner->location) }}" required>
        </div>

        <!-- Country -->
        <div class="mb-3">
          <label for="country" class="form-label">Country</label>
          <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $banner->country) }}" required>
        </div>

        <!-- Title Line 1 -->
        <div class="mb-3">
          <label for="title_line1" class="form-label">Title Line 1</label>
          <input type="text" name="title_line1" id="title_line1" class="form-control" value="{{ old('title_line1', $banner->title_line1) }}" required>
        </div>

        <!-- Title Line 2 -->
        <div class="mb-3">
          <label for="title_line2" class="form-label">Title Line 2</label>
          <input type="text" name="title_line2" id="title_line2" class="form-control" value="{{ old('title_line2', $banner->title_line2) }}">
        </div>

        <!-- Background Image -->
        <div class="mb-3">
          <label class="form-label">Current Image</label><br>
          <img src="{{ asset('storage/' . $banner->background_image) }}" width="120" class="rounded shadow-sm mb-2" />
          <input type="file" name="background_image" class="form-control mt-2">
          <small class="text-muted">Leave empty if you don't want to change the image.</small>
        </div>

        <!-- Submit -->
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">💾 Update Banner</button>
          <a href="{{ route('admin2.hero.index') }}" class="btn btn-secondary">⬅️ Back</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
