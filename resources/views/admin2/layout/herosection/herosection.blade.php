<style>

</style>


@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 MARGIN FIX -->
  <div class="row">
    <!-- Left: Add Banner Form -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm border-0 h-100">
       <div class="card-body form-container"> <!-- 👈 Just make sure this class is there -->


          <h5 class="card-title text-primary mb-4">Add Home Banner</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('admin2.hero.store') }}" method="POST" enctype="multipart/form-data">
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

            <button type="submit" class="btn btn-success w-100">Save Banner</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Right: List -->
    
  </div>
</div>
@endsection
