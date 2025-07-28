@extends( 'admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 margin fix -->
  <div class="row">

    <!-- Left: Add Featured Section -->
    <div class="col-md-6 mb-4">
      <div class="form-container">
        <div class="card-body">

          <h5 class="card-title text-primary mb-4">➕ Add Contact section</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('admin2.contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="form-label">main-heading</label>
              <input type="text" name="mainheading" class="form-control" placeholder="Enter heading" required>
            </div>

            <div class="mb-3">
              <label class="form-label">sub-heading</label>
              <input type="text" name="subheading" class="form-control" placeholder="Enter heading" required>
            </div>

             <div class="mb-3">
                   <label for="" class="form-label">Description</label>
  <textarea name="description" class="form-control" placeholder="Enter Contact description here..."></textarea>
                </div>

            <div class="mb-3">
              <label class="form-label">Mobile Number</label>
              <input type="number" name="phonenumber" class="form-control" placeholder="Enter heading" required>
            </div>

            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="text" name="email" class="form-control" placeholder="Enter subheading" required>
            </div>

            <button type="submit" class="btn btn-success w-100">💾 Save Section</button>
            </form>
            </div>
            </div>
            </div>

@endsection
