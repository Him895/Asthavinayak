@extends('admin2.layout.index')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card p-4">
            <h4 class="text-primary mb-4">Edit Best Deal</h4>

            <form action="{{ route('admin2.bestdeals.update', $deals->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Type</label>
                    <select name="type" class="form-control" required>
                        <option value="Apartment" {{ $deals->type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="Villa" {{ $deals->type == 'Villa' ? 'selected' : '' }}>Villa</option>
                        <option value="Penthouse" {{ $deals->type == 'Penthouse' ? 'selected' : '' }}>PentHouse</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $deals->heading }}" required>
                </div>

                <div class="mb-3">
                    <label>Subheading</label>
                    <input type="text" name="subheading" class="form-control" value="{{ $deals->subheading }}" required>
                </div>

                <div class="mb-3">
                    <label>Image (Current)</label><br>
                    @if($deals->image)
                        <img src="{{ asset('storage/'.$deals->image) }}" width="100" class="mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $deals->description }}" required>
                </div>

                <hr>
                <h5>Details</h5>
                @php
                    $details = json_decode($deals->details, true);
                @endphp

                @foreach($details as $index => $item)
                    <div class="mb-2">
                        <label>Entry {{ $index + 1 }}</label>
                        <div class="input-group">
                            <input type="text" name="details_keys[]" class="form-control" value="{{ $item['key'] }}" placeholder="Key" required>
                            <input type="text" name="details_values[]" class="form-control" value="{{ $item['value'] }}" placeholder="Value" required>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-3">Update Deal</button>
                <a href="{{ route('admin2.bestdeals.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
