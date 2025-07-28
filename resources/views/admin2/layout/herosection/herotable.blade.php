
@extends('admin2.layout.index')

@section('content')

<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 MARGIN FIX -->
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title text-primary mb-4">📋 Home Banners List</h5>

          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Location</th>
                  <th>Heading</th>
                  <th>Image</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @forelse($banners as $banner)
                <tr>
                  <td>{{ $banner->id }}</td>
                    <td>{{ $banner->location }}, {{ $banner->country }}</td>
                  <td>
                    <strong>{{ $banner->title_line1 }}</strong><br>
                    <span class="text-muted">{{ $banner->title_line2 }}</span>
                  </td>
                  <td>
                    <img src="{{ asset('storage/' . $banner->background_image) }}" width="80" class="rounded shadow-sm" />
                  </td>
                  <td>
                    <a href="{{ route('admin2.home-banner.edit', $banner->id) }}" class="btn btn-sm btn-warning mb-1">✏️</a>
                    <form action="{{ route('admin2.home-banner.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
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
    @endsection

