@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">
  <div class="row">
    <div class="col-md-8 offset-md-2 mb-4">
      <div class="card-body">

        <h5 class="card-title text-primary mb-4">✏️ Edit Contact Section</h5>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin2.contact.update', $contacts->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
           @method('PUT')

          <div class="mb-3">
            <label class="form-label">Main Heading</label>
            <input type="text" name="mainheading" class="form-control" value="{{ $contacts->mainheading }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Sub Heading</label>
            <input type="text" name="subheading" class="form-control" value="{{ $contacts->subheading }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $contacts->description }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Mobile Number</label>
            <input type="number" name="phonenumber" class="form-control" value="{{ $contacts->phonenumber }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $contacts->email }}" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">💾 Update Contact</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
