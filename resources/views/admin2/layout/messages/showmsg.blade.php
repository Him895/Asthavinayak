@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-4" style="margin-top: 80px;">
    <div class="row justify-content-center bg-white">
        <div class="col-md-10">

            <div class="card shadow rounded border-0 bg-white">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📩 Message Details</h5>
                </div>

                <div class="card-body bg-primary text-white">

                    <div class="mb-3">
                        <strong>Name:</strong>
                        <span>{{ $message->name }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong>
                        <span>{{ $message->email }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Subject:</strong>
                        <span>{{ $message->subject }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Message:</strong>
                        <div class="p-3 bg-light border rounded">
                            {{ $message->message }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Received At:</strong>
                        <span>{{ $message->created_at->format('d M, Y h:i A') }}</span>
                    </div>

                </div>

                <div class="card-footer bg-white text-end">
                    <a href="{{ route('admin2.messages.reply.form', $message->id) }}" class="btn btn-success">✉️ Reply</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
