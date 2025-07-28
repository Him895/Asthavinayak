@extends( 'admin2.layout.index')

@section('title', 'Manage Featured Section')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 margin fix -->
  <div class="row">

    <!-- Left: Add Featured Section -->
    <div class="col-md-6 mb-4">
      <div class="form-container">
        <div class="card-body">

          <h5 class="card-title text-primary mb-4">➕ Add Featured Section</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('admin2.featuredsection.store') }}" method="POST" enctype="multipart/form-data">
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

            <!-- Accordion Questions -->
            <div class="mb-3">
              <label class="form-label">Why Choose Us (3 Questions)</label>

              @for($i = 1; $i <= 3; $i++)
              <div class="border p-2 rounded mb-2">
                <input type="text" name="accordion_titles[]" class="form-control mb-2" placeholder="Question {{ $i }} Title" required>
                <textarea name="accordion_contents[]" class="form-control" rows="2" placeholder="Question {{ $i }} Answer" required></textarea>
              </div>
              @endfor
            </div>

            <!-- Info Table Section -->
            <div class="mb-3">
              <label class="form-label">Info Table Entries</label>

              @for($i = 1; $i <= 4; $i++)
              <div class="input-group mb-2">
                <input type="file" name="info_icons[]" class="form-control" required>
                <input type="text" name="info_keys[]" class="form-control" placeholder="Key (e.g. Payment)" required>
                <input type="text" name="info_values[]" class="form-control" placeholder="Value (e.g. Processed)" required>
              </div>
              @endfor
            </div>

            <button type="submit" class="btn btn-success w-100">💾 Save Section</button>
          </form>

        </div>
      </div>
    </div>

   
      </div>
    </div>

  </div>
</div>
@endsection
