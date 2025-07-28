@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">
    <div class="card p-3">
        <h5 class="text-primary">📋 Contact Details</h5>

        <table class="table table-bordered  mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Main Heading</th>
                    <th>Sub Heading</th>
                    <th>Description</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->mainheading }}</td>
                        <td>{{ $contact->subheading }}</td>
                        <td>{{ $contact->description }}</td>
                        <td>{{ $contact->phonenumber }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <a href="{{ route('admin2.contact.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin2.contact.destroy', $contact->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">No Contact Info Found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
