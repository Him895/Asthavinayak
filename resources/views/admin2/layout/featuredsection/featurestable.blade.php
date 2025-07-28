@extends('admin2.layout.index')

@section('content')



<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 MARGIN FIX -->
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title text-primary mb-4">📋 Featured Section List</h5>

         <div class="table-responsive">
  <table class="table table-bordered align-middle text-center shadow-sm rounded">
    <thead class="table-primary">
      <tr class="align-middle text-nowrap">
        <th>ID</th>
        <th>Heading</th>
        <th>Image</th>
        <th>Icon</th>
        <th>Accordions</th>
        <th>Info Tables</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($featured as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td class="fw-semibold text-primary">{{ $item->heading }}</td>

        <td>
          <img src="{{ asset('storage/' . $item->left_image) }}" width="60" class="rounded shadow-sm" />
        </td>

        <td>
          <img src="{{ asset('storage/' . $item->icon_image) }}" width="40" class="shadow-sm" />
        </td>

        <td class="text-start" style="max-width: 300px;">
          @php
            $accordions = json_decode($item->accordions, true);
          @endphp

          @if(is_array($accordions))
            <ul class="list-unstyled mb-0">
              @foreach($accordions as $a)
                <li class="mb-2">
                  <strong>{{ $a['title'] ?? 'No Title' }}</strong><br>
                  <small class="text-muted">{{ Str::limit($a['content'] ?? '', 100) }}</small>
                </li>
              @endforeach
            </ul>
          @else
            <span class="text-muted">Invalid JSON</span>
          @endif
        </td>

        <td class="text-start" style="max-width: 220px;">
          @php
            $info = json_decode($item->info_table, true);
          @endphp

          @if(is_array($info))
            <ul class="list-unstyled mb-0">
              @foreach($info as $i)
                <li class="mb-2 d-flex align-items-center gap-2">
                  <img src="{{ asset('storage/' . ($i['icon'] ?? '')) }}" width="25">
                  <div>
                    <strong>{{ $i['key'] ?? 'N/A' }}</strong><br>
                    <small class="text-muted">{{ $i['value'] ?? 'N/A' }}</small>
                  </div>
                </li>
              @endforeach
            </ul>
          @else
            <span class="text-muted">No Info</span>
          @endif
        </td>

        <td class="text-nowrap">
          <a href="{{ route('admin2.featured.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">✏️</a>
          <form action="{{ route('admin2.featured.destroy', $item->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="7" class="text-center text-muted">No featured sections found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>


        </div>
      </div>
      @endsection
