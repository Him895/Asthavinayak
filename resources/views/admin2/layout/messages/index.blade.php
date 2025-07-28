@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">  <!-- 👈 MARGIN FIX -->
    <h2>User Messages</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Action</th>

                <th>Received At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $msg)
            <tr @if ($msg->is_read == 0 )
               style="background-color: #999999;"
            @endif>
                <td><a href="{{ route('showmessage',$msg->id) }}">{{ $msg->id }}</a></td>
                <td><a href="{{ route('showmessage',$msg->id) }}">{{ $msg->name }}</a></td>
                <td><a href="{{ route('showmessage',$msg->id) }}">{{ $msg->email }}</a></td>
                <td><a href="{{ route('showmessage',$msg->id) }}">{{ $msg->subject }}</a></td>

                <td>{{ $msg->created_at->format('d-m-Y h:i A') }}</td>
                <td>
 <form action="{{ route('admin2.messages.destroy', $msg->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>        </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No messages found</td>
            </tr>
            @endforelse
        </tbody>
    </table>


</div>
@endsection
