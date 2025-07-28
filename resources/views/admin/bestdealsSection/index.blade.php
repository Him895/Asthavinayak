@extends('layouts.admin')

@section('content')
<div class="row">
    <!-- left: add form -->
     <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
           <div class="card-body">
            <h5 class="card-title text-primary mb-4">Add Beast Deal</h5>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('bestdeals.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-lable">Type</label>
                    <select name="type" id="" class="form-control" required>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">villa</option>
                        <option value="Penthouse">PentHouse</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" required>
                </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Sub-Heading</label>
                    <input type="text" name="subheading" class="form-control" placeholder="Enter subHeading" required>
                </div>

                <div class="mb3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                 <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter description" required>
                </div>


                  <div class="mb-3">
  <label class="form-label">Details - Entry 1</label>
  <div class="input-group mb-2">
    <input type="text" name="details_keys[]" class="form-control" placeholder="Key (e.g. Area)" required>
    <input type="text" name="details_values[]" class="form-control" placeholder="Value (e.g. 180 m2)" required>
  </div>

  <label class="form-label">Details - Entry 2</label>
  <div class="input-group mb-2">
    <input type="text" name="details_keys[]" class="form-control" placeholder="Key (e.g. floor number)" required>
    <input type="text" name="details_values[]" class="form-control" placeholder="Value (e.g. 26th)" required>
  </div>

  <label class="form-label">Details - Entry 3</label>
  <div class="input-group mb-2">
    <input type="text" name="details_keys[]" class="form-control" placeholder="Key (e.g. Rooms)" required>
    <input type="text" name="details_values[]" class="form-control" placeholder="Value (e.g. 4)" required>
  </div>

  <label class="form-label">Details - Entry 4</label>
  <div class="input-group mb-2">
    <input type="text" name="details_keys[]" class="form-control" placeholder="Key (e.g. Parkeing)" required>
    <input type="text" name="details_values[]" class="form-control" placeholder="Value (e.g. yes/no)" required>
  </div>

    <label class="form-label">Details - Entry 4</label>
  <div class="input-group mb-2">
    <input type="text" name="details_keys[]" class="form-control" placeholder="Key (e.g. Payment)" required>
    <input type="text" name="details_values[]" class="form-control" placeholder="Value (e.g. bank)" required>
  </div>
</div>

 <button type="submit" class="btn btn-success w-100">Save Details</button>
            </form>
           </div>
        </div>
     </div>
</div>
@endsection
