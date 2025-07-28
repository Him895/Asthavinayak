@extends('layouts.admin')

@section('content')
<div class="row">
     <!-- left: add form -->
      <div class="col-md-6 md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-primary mb-4">Add Propertey</h5>

              @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



            <form action="{{ route('propertey.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                   <label for="" class="form-label">Heading</label>
                <input type="text" class="form-control" placeholder="Enter type of properties" name="heading" required>
                </div>

                <div class="mb-3">
                   <label for="" class="form-label">Subheading</label>
                <input type="text" class="form-control" placeholder="Enter type of properties" name="subheading" required>
                </div>


                <div class="mb-3">
                   <label for="" class="form-label">Type</label>
                <input type="text" class="form-control" placeholder="Enter type of properties" name="type" required>
                </div>

                 <div class="mb-3">
                   <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" placeholder="insert image file" name="image" required>
                </div>

                <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <input type="number" class="form-control" placeholder="Enter price" name="price" step="0.01" required>
</div>


                 <div class="mb-3">
                   <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                </div>


                 <div class="mb-3">
                   <label for="" class="form-label">Details</label>
                <input type="text" class="form-control" placeholder="Enter Bedrooms" name="details[Bedrooms]" required>
                <input type="text" class="form-control" placeholder="Enter Bathrooms" name="details[Bathrooms]" required>
                <input type="text" class="form-control" placeholder="Enter Area" name="details[Areas]" required>
                <input type="text" class="form-control" placeholder="Enter Floor" name="details[Floor]" required>
                <input type="text" class="form-control" placeholder="Enter Parkings" name="details[Parkings]" required>
                </div>

                 <button type="submit" class="btn btn-success w-100">Save Propertey</button>




            </form>

            </div>
        </div>
      </div>
</div>
@endsection

