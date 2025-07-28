@extends('layouts.admin')

@section('title', 'Manage Home Banner')

@section('content')
<div class="row">
  <!-- Left: Add Banner Form -->
  <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-primary mb-4"> Add Home Banner</h5>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('home-banners.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="e.g. Toronto" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Country</label>
            <input type="text" name="country" class="form-control" placeholder="e.g. Canada" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Title Line 1</label>
            <input type="text" name="title_line1" class="form-control" placeholder="e.g. Hurry!" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Title Line 2</label>
            <input type="text" name="title_line2" class="form-control" placeholder="e.g. Get the Best Villa" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" name="background_image" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-success w-80"> Save Banner</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Right: List -->
  <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-primary mb-4">📋 Home Banners List</h5>

        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Heading</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($banners as $banner)
              <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->title_line1 }}<br>{{ $banner->title_line2 }}</td>
                <td>
                  <img src="{{ asset('storage/' . $banner->background_image) }}" width="70" class="rounded" />
                </td>
                <td>
                  <a href="{{ route('home-banner.edit', $banner->id) }}" class="btn btn-sm btn-warning me-1">✏️</a>
                  <form action="{{ route('home-banner.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')">🗑️</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted">No banners added yet.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
