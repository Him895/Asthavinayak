@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">
    <div class="table-responsive card p-3">
        <h5 class="text-primary">Best Deals List</h5>

        <table class="table table-bordered mt-3" >
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Details</th>
                    <th>Actions</th> <!-- 👈 New Column -->
                </tr>
            </thead>
            <tbody>
                @forelse($deals as $deal)
                    <tr>
                        <td>{{ $deal->type }}</td>
                        <td>{{ $deal->heading }}</td>
                        <td>
                            @if($deal->image)
                                <img src="{{ asset('storage/'.$deal->image) }}" width="70">
                            @endif
                        </td>
                        <td>{{ $deal->description }}</td>
                        <td>
                            @php
                                $details = json_decode($deal->details, true);
                            @endphp
                            <ul class="list-unstyled mb-0">
                                @foreach($details as $item)
                                    <li><strong>{{ $item['key'] }}</strong>: {{ $item['value'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
<a href="{{ route('admin2.bestdeals.edit', $deal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin2.bestdeals.destroy', $deal->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No deals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
