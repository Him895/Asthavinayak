@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 50px;">
    <div class="row">
    <!-- left: add form -->
    <div class="col-md-6 md-4">
        <div class="form-container">
            <div class="card-body">
                <h5 class="card-title text-primary mb-4">Add Video Section</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin2.videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Main Heading</label>
                        <input type="text" class="form-control" placeholder="Enter main heading" name="main_heading" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Background Image</label>
                        <input type="file" class="form-control" name="background_image" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Video File</label>
                        <input type="file" class="form-control" name="video_file" required>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
