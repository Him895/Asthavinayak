@extends('layouts.admin')

@section('title', 'Manage Featured Section')

@section('content')
<div class="row">
  <!-- Left: Add Form -->
  <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-primary mb-4">➕ Add Featured Section</h5>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('featured.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label class="form-label">Heading</label>
            <input type="text" name="heading" class="form-control" placeholder="Enter heading" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Subheading</label>
            <input type="text" name="subheading" class="form-control" placeholder="Enter subheading" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Left Image</label>
            <input type="file" name="left_image" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Icon Image</label>
            <input type="file" name="icon_image" class="form-control" required>
          </div>
        <!--Accordian section -->

          <div class="mb-3">
  <label class="form-label">Why Choose Us (3 Questions)</label>

  <div class="accordion-item mb-3">
    <input type="text" name="accordion_titles[]" class="form-control mb-2" placeholder="Question 1 Title" required>
    <textarea name="accordion_contents[]" class="form-control" rows="2" placeholder="Question 1 Answer" required></textarea>
  </div>

  <div class="accordion-item mb-3">
    <input type="text" name="accordion_titles[]" class="form-control mb-2" placeholder="Question 2 Title" required>
    <textarea name="accordion_contents[]" class="form-control" rows="2" placeholder="Question 2 Answer" required></textarea>
  </div>

  <div class="accordion-item mb-3">
    <input type="text" name="accordion_titles[]" class="form-control mb-2" placeholder="Question 3 Title" required>
    <textarea name="accordion_contents[]" class="form-control" rows="2" placeholder="Question 3 Answer" required></textarea>
  </div>
</div>


        <div class="mb-3">
  <label class="form-label">Info Table - Entry 1</label>
  <div class="input-group mb-2">
    <input type="file" name="info_icons[]" class="form-control" required>
    <input type="text" name="info_keys[]" class="form-control" placeholder="Key (e.g. 250 m2)" required>
    <input type="text" name="info_values[]" class="form-control" placeholder="Value (e.g. Total Flat Space)" required>
  </div>

  <label class="form-label">Info Table - Entry 2</label>
  <div class="input-group mb-2">
    <input type="file" name="info_icons[]" class="form-control" required>
    <input type="text" name="info_keys[]" class="form-control" placeholder="Key (e.g. Contract)" required>
    <input type="text" name="info_values[]" class="form-control" placeholder="Value (e.g. Contract Ready)" required>
  </div>

  <label class="form-label">Info Table - Entry 3</label>
  <div class="input-group mb-2">
    <input type="file" name="info_icons[]" class="form-control" required>
    <input type="text" name="info_keys[]" class="form-control" placeholder="Key (e.g. Payment)" required>
    <input type="text" name="info_values[]" class="form-control" placeholder="Value (e.g. Payment Process)" required>
  </div>

  <label class="form-label">Info Table - Entry 4</label>
  <div class="input-group mb-2">
    <input type="file" name="info_icons[]" class="form-control" required>
    <input type="text" name="info_keys[]" class="form-control" placeholder="Key (e.g. Safety)" required>
    <input type="text" name="info_values[]" class="form-control" placeholder="Value (e.g. 24/7 Under Control)" required>
  </div>
</div>


          <button type="submit" class="btn btn-success w-100">💾 Save Section</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Right: Featured Section Table -->
  <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-primary mb-4">📋 Featured Section List</h5>

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
              @forelse($featured as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->heading }}</td>
                <td>
                  <img src="{{ asset('storage/' . $item->left_image) }}" width="70" class="rounded" />
                </td>
                <td>
                  <a href="{{ route('featured.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">✏️</a>
                  <form action="{{ route('featured.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted">No featured sections found.</td>
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
